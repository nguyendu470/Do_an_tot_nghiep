<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chap extends Model
{
    protected $table = 'chapter';
    protected $fillable = ["webinar_id","title"];

    public function files()
    {
        return $this->hasMany('App\Models\File', 'chap_id', 'id');
    }

    public function textLessons()
    {
        return $this->hasMany('App\Models\TextLesson', 'chap_id', 'id');
    }
}
?>