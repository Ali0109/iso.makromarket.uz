<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Media;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function get_data(Request $request)
    {
        $validation = $request->validate([
            'user_id' => 'required',
            'shop_id' => 'required',
            'department_id' => 'required',
            'problem_id' => 'required',
            'comment' => 'required',
            'file' => 'required',
        ]);


        $extension = $request->file('file')->extension();
        if ($extension == 'svg' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            $collection_type = 'image';
            $model_type = 'App\Model\Application';
            if ($file = $request->file('file')->store('upload', 'public')) {
                $disk = 'public';
                $file_full_name = explode('/', $file)[1];
                $file_name = explode('.', $file_full_name)[0];
                $size = $request->file('file')->getSize();

                $application = Application::create([
                    'user_id' => $request->input('user_id'),
                    'shop_id' => $request->input('shop_id'),
                    'department_id' => $request->input('department_id'),
                    'problem_id' => $request->input('problem_id'),
                    'comment' => $request->input('comment'),
                ]);

                $media = Media::create([
                    'model_type' => $model_type,
                    'model_id' => $application->id,
                    'file_full_name' => $file_full_name,
                    'file_name' => $file_name,
                    'collection_type' => $collection_type,
                    'extension' => $extension,
                    'disk' => $disk,
                    'size' => $size,
                ]);


                return response()->json('message: OK', 200);
            }
        }
        return response()->json('message: error. svg, png, jpg, jpeg format validated', 500);
    }
}
