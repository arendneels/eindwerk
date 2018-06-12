<?php

namespace App\Http\Controllers\back;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class DropzoneController extends Controller
{
    public function add(){
        $file = Input::file('file');
        $destinationPath = 'images';
        $filenameFull = Carbon::now() . $file->getClientOriginalName();
        $filename = str_replace([' ', ':', '/', '-'],'' , $filenameFull);
        $upload_success = Input::file('file')->move($destinationPath, $filename);

        if( $upload_success ) {
            return response()->json([
                'photo_name' => $filename,
                'status' => 200,
            ]);
        } else {
            return Response::json('error', 400);
        }
    }
}
