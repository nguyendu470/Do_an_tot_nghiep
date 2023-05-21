<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use App\Models\Chap;
use Maatwebsite\Excel\Excel;
use App\Imports\FileImport;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('admin_webinars_edit');

        $data = $request->all();

        if (empty($data['storage'])) {
            $data['storage'] = 'local';
        }

        if (!empty($data['file_path']) and is_array($data['file_path'])) {
            $data['file_path'] = $data['file_path'][0];
        }

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'chap_id' => 'bail|required_without:title_chap',
            'title_chap' => 'bail|required_without:chap_id',
            'title' => 'required|max:64',
            'accessibility' => 'required|' . Rule::in(File::$accessibility),
            'file_path' => 'required',
            'file_type' => 'required_if:storage,online',
            'volume' => 'required_if:storage,online',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        if (!empty($data['webinar_id'])) {
            $webinar = Webinar::where('id', $data['webinar_id'])->first();

            if (!empty($webinar)) {
                //$teacher = $webinar->creator;

                $volumeMatches = [''];
                $fileInfos = null;
                if ($data['storage'] == 'local') {
                    $fileInfos = $this->fileInfo($data['file_path']);
                } else {
                    preg_match('!\d+!', $data['volume'], $volumeMatches);
                }
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

                File::create([
                    'creator_id' => $webinar->creator_id,
                    'webinar_id' => $data['webinar_id'],
                    'chap_id' => $chap_id,
                    'title' => $data['title'],
                    'file' => $data['file_path'],
                    'volume' => !empty($fileInfos) ?formatSizeUnits( $fileInfos['size']): $data['volume'],
                    'file_type' => !empty($fileInfos) ? $fileInfos['extension'] : $data['file_type'],
                    'accessibility' => $data['accessibility'],
                    'storage' => $data['storage'],
                    'downloadable' => !empty($data['downloadable']) ? true : false,
                    'description' => $data['description'],
                    'created_at' => time()
                ]);

                return response()->json([
                    'code' => 200,
                ], 200);
            }
        }

        return response()->json([], 422);
    }

    public function store_chap(Request $request)
    {
        $this->authorize('admin_webinars_edit');

        $data = $request->all();
        
        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'title' => 'required|max:150'
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        if (!empty($data['webinar_id'])) {
            $webinar = Webinar::where('id', $data['webinar_id'])->first();

            if (!empty($webinar)) {
                //$teacher = $webinar->creator;

                

                \DB::table('chapter')->insert([
                    'webinar_id' => $data['webinar_id'],
                    'title' => $data['title'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                return response()->json([
                    'code' => 200,
                ], 200);
            }
        }

        return response()->json([], 422);
    }


    public function edit(Request $request, $id)
    {
        $this->authorize('admin_webinars_edit');

        $file = File::where('id', $id)->first();

        if (!empty($file)) {
            $file->file_path = $file->file;

            return response()->json([
                'file' => $file
            ], 200);
        }

        return response()->json([], 422);
    }

    public function edit_chap(Request $request, $id)
    {
        $this->authorize('admin_webinars_edit');

        $chap = \DB::table('chapter')->where('id', $id)->first();

        if (!empty($chap)) {

            return response()->json([
                'chap' => $chap
            ], 200);
        }

        return response()->json([], 422);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin_webinars_edit');

        $data = $request->all();

        if (empty($data['storage'])) {
            $data['storage'] = 'local';
        }

        if (!empty($data['file_path']) and is_array($data['file_path'])) {
            $data['file_path'] = $data['file_path'][0];
        }

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'chap_id' => 'bail|required_without:title_chap',
            'title_chap' => 'bail|required_without:chap_id',
            'title' => 'required|max:64',
            'accessibility' => 'required|' . Rule::in(File::$accessibility),
            'file_path' => 'required',
            'file_type' => 'required_if:storage,online',
            'volume' => 'required_if:storage,online',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        $volumeMatches = ['0'];
        $fileInfos = null;
        if ($data['storage'] == 'local') {
            $fileInfos = $this->fileInfo($data['file_path']);
        } else {
            preg_match('!\d+!', $data['volume'], $volumeMatches);
        }
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
        $file = File::where('id', $id)->first();

        if (!empty($file)) {

            $file->update([
                'title' => $data['title'],
                'chap_id' => $chap_id,
                'file' => $data['file_path'],
                'volume' => !empty($fileInfos) ?formatSizeUnits( $fileInfos['size']): $data['volume'],
                'file_type' => !empty($fileInfos) ? $fileInfos['extension'] : $data['file_type'],
                'accessibility' => $data['accessibility'],
                'storage' => $data['storage'],
                'downloadable' => !empty($data['downloadable']) ? true : false,
                'description' => $data['description'],
                'updated_at' => time()
            ]);

            return response()->json([
                'code' => 200,
            ], 200);
        }

        return response()->json([], 422);
    }

    public function update_chap(Request $request, $id)
    {
        $this->authorize('admin_webinars_edit');

        $data = $request->all();


        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'title' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        $chap = \DB::table('chapter')->where('id', $id)->first();

        if (!empty($chap)) {
           \DB::table('chapter')->where('id', $id)->update([
                'title' => $data['title'],
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            return response()->json([
                'code' => 200,
            ], 200);
        }

        return response()->json([], 422);
    }

    public function fileInfo($path)
    {
        $file = array();

        $file_path = public_path($path);

        $filePath = pathinfo($file_path);

        $file['name'] = $filePath['filename'];
        $file['extension'] = $filePath['extension'];
        $file['size'] = filesize($file_path);

        return $file;
    }

    public function destroy(Request $request, $id)
    {
        $this->authorize('admin_webinars_edit');

        $file = File::where('id', $id)
            ->first();

        if (!empty($file)) {
            $file->delete();
        }

        return redirect()->back();
    }

    public function destroy_chap(Request $request, $id)
    {
        $this->authorize('admin_webinars_edit');

        $chap = \DB::table('chapter')->where('id', $id)->first();

        if (!empty($chap)) {
            \DB::table('chapter')->where('id', $id)->delete();
        }

        return redirect()->back();
    }

    public function import(Request $request)
    {
        $this->authorize('admin_webinars_edit');

        $data = $request->all();

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'file' => ['required', 'file'],
        ]);

        ExcelFacade::import(new FileImport, $request->file('file'));

        return redirect()->back();
    }
}
