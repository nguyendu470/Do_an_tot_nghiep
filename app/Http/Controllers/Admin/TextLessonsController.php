<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\TextLesson;
use App\Models\TextLessonAttachment;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use App\Models\Chap;
use Maatwebsite\Excel\Excel;
use App\Imports\TextImport;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;

class TextLessonsController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('admin_webinars_edit');

        $data = $request->all();

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'title' => 'required',
            'chap_id' => 'bail|required_without:title_chap',
            'title_chap' => 'bail|required_without:chap_id',
            'study_time' => 'required|numeric',
            'image' => 'required',
            'accessibility' => 'required|' . Rule::in(File::$accessibility),
            'summary' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        

        $webinar = Webinar::where('id', $data['webinar_id'])->first();
        $chap_id = $data['chap_id']??0;
        if(!empty($data['title_chap'])){
            $chap = Chap::create([
                'webinar_id' => $data['webinar_id'],
                'title' => $data['title_chap'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $chap_id = $chap->id;
        }
        $lessonsCount = TextLesson::where('webinar_id', $data['webinar_id'])->count();
        if (!empty($webinar)) {
            $textLesson = TextLesson::create([
                'creator_id' => $webinar->creator_id,
                'webinar_id' => $data['webinar_id'],
                'chap_id'   =>  $chap_id,
                'title' => $data['title'],
                'image' => $data['image'],
                'study_time' => $data['study_time'],
                'accessibility' => $data['accessibility'],
                'order' => $lessonsCount + 1,
                'summary' => $data['summary'],
                'content' => $data['content'],
                'created_at' => time(),
            ]);

            if (!empty($data['attachments'])) {
                $attachments = $data['attachments'];
                $this->saveAttachments($textLesson, $attachments);
            }

            return response()->json([
                'code' => 200,
            ], 200);
        }

        return response()->json([], 422);
    }

    public function edit($id)
    {
        $this->authorize('admin_webinars_edit');

        $testLesson = TextLesson::where('id', $id)->first();

        if (!empty($testLesson)) {
            $testLesson->attachments = $testLesson->attachments->toArray();
        }

        return response()->json([
            'testLesson' => $testLesson
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin_webinars_edit');

        $data = $request->all();

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'title' => 'required',
            'chap_id' => 'bail|required_without:title_chap',
            'title_chap' => 'bail|required_without:chap_id',
            'study_time' => 'required|numeric',
            'image' => 'required',
            'accessibility' => 'required|' . Rule::in(File::$accessibility),
            'summary' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        $textLesson = TextLesson::where('id', $id)
            ->first();

        $chap_id = $data['chap_id']??0;
        if(!empty($data['title_chap'])){
            $chap = Chap::create([
                'webinar_id' => $data['webinar_id'],
                'title' => $data['title_chap'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $chap_id = $chap->id;
        }

        if (!empty($textLesson)) {
            $textLesson->update([
                'title' => $data['title'],
                'chap_id'   =>  $chap_id,
                'image' => $data['image'],
                'study_time' => $data['study_time'],
                'accessibility' => $data['accessibility'],
                'summary' => $data['summary'],
                'content' => $data['content'],
                'updated_at' => time(),
            ]);

            $textLesson->attachments()->delete();

            if (!empty($data['attachments'])) {
                $attachments = $data['attachments'];
                $this->saveAttachments($textLesson, $attachments);
            }

            return response()->json([
                'code' => 200,
            ], 200);
        }

        return response()->json([], 422);
    }

    public function destroy($id)
    {
        $this->authorize('admin_webinars_edit');

        $testLesson = TextLesson::where('id', $id)->first();

        if (!empty($testLesson)) {
            $testLesson->delete();
        }

        return back();
    }

    private function saveAttachments($textLesson, $attachments)
    {
        if (!empty($attachments)) {

            if (!is_array($attachments)) {
                $attachments = [$attachments];
            }

            foreach ($attachments as $attachment_id) {
                if (!empty($attachment_id)) {
                    TextLessonAttachment::create([
                        'text_lesson_id' => $textLesson->id,
                        'file_id' => $attachment_id,
                        'created_at' => time(),
                    ]);
                }
            }
        }
    }

    public function import(Request $request)
    {
        $this->authorize('admin_webinars_edit');

        $data = $request->all();

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'file' => ['required', 'file'],
        ]);

        ExcelFacade::import(new TextImport, $request->file('file'));

        return redirect()->back();
    }
}
