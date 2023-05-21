<?php
namespace App\Imports;

use Maatwebsite\Excel\Row;
use Illuminate\Support\Collection;
use Modules\Product\Entities\Product;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\TextLesson;
use App\Models\Webinar;
use App\Models\Chap;
class TextImport implements OnEachRow, WithChunkReading, WithHeadingRow
{
    public function chunkSize(): int
    {
        return 200;
    }

    public function onRow(Row $row)
    {
        $data = $row->toArray();
        try {
            $webinar = Webinar::where('id', request('webinar_id'))->first();
            if(!empty($webinar)){
                $chap = Chap::where('title', $data['chap'])->where('webinar_id',request('webinar_id'))->first();
                $chap_id = 0;
                if (!empty($chap)) {
                   $chap_id = $chap->id;
                }else{
                    $chap = Chap::create([
                        'webinar_id' => request('webinar_id'),
                        'title' => $data['chap'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    $chap_id = $chap->id;
                }
                $lessonsCount = TextLesson::where('webinar_id', request('webinar_id'))->count();
                $textLesson = TextLesson::create([
                    'creator_id' => $webinar->creator_id,
                    'webinar_id' => request('webinar_id'),
                    'chap_id'   =>  $chap_id,
                    'title' => $data['title'],
                    'study_time' => $data['study_time'],
                    'accessibility' => $data['accessibility'],
                    'order' => $lessonsCount + 1,
                    'summary' => $data['summary'],
                    'content' => $data['content'],
                    'created_at' => time(),
                ]);
            }
            
        } catch (QueryException | ValidationException $e) {
            session()->push('importer_errors', $row->getIndex());
        }
    }
}

?>