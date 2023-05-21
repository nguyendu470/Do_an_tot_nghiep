<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    static $cacheKey = 'categories';
    use Sluggable;
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'otitle'
            ]
        ];
    }
    public function getOtitleAttribute(): string
    {
        return Str::slug($this->title);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany($this, 'parent_id', 'id')->orderBy('order', 'asc');
    }

    public function filters()
    {
        return $this->hasMany('App\Models\Filter', 'category_id', 'id');
    }

    public function webinars()
    {
        return $this->hasMany('App\Models\Webinar', 'category_id', 'id');
    }

    public function userOccupations()
    {
        return $this->hasMany('App\Models\UserOccupation', 'category_id', 'id');
    }

    public function getUrl()
    {
        return '/categories/' . $this->slug;
    }

    static function getCategories()
    {
        $categories = cache()->remember(self::$cacheKey, 24 * 60 * 60, function () {
            return self::whereNull('parent_id')
                ->with([
                    'subCategories' => function ($query) {
                        $query->orderBy('order', 'asc');
                    },
                ])
                ->get();
        });

        return $categories;
    }

    public function getCategoryCourses()
    {
        $webinars = collect([]);
        $subCategories = $this->subCategories;

        foreach ($subCategories as $category) {
            $webinars = $webinars->merge($category->webinars);
        }

        return $webinars;
    }

    public function getCategoryInstructorsIdsHasMeeting()
    {
        $ids = [];
        $subCategories = $this->subCategories;

        foreach ($subCategories as $category) {
            if (count($category->userOccupations)) {
                foreach ($category->userOccupations as $occupation) {
                    if (!empty($occupation->user) and !$occupation->user->isUser() and !$occupation->user->isAdmin()) {
                        if (!empty($occupation->user->hasMeeting())) {
                            $ids[] = $occupation->user->id;
                        }
                    }
                }
            }
        }

        return $ids;
    }
}