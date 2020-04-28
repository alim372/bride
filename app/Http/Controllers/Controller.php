<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    public $limit = 10;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
# -------------------------------------------------
    public function successResponse($data, $message = NULL)
    {
        $response = array(
            'status'  => TRUE,
            'message' => $message,
            'data'    => $data
        );
        return response()->json($response);
    }
# -------------------------------------------------
    public function errorResponse($errors , $data = NULL)
    {
        $response = array(
            'status'  => FALSE,
            'message' => $errors,
            'data'    => $data
        );
        return response()->json($response);
    }
# -------------------------------------------------
    public function generateToken()
    {
        //  return "123456789";
        return str_random(70);
    }
# -------------------------------------------------
    public function generateCode()
    {
        return "0000";
        return rand(1000,9999);
    }
# -------------------------------------------------
    public function formatErrors($errors)
    {
        $stringError = "";
        for ($i=0; $i < count($errors->all()); $i++) {
            $stringError = $stringError . $errors->all()[$i];
            if($i != count($errors->all())-1){
                $stringError = $stringError . '\n';
            }
        }
        return $stringError;
    }
# -------------------------------------------------
    public function uploadFile($file, $path)
    {
        $filename = str_random(20).'_'.time().'.'.$file->getClientOriginalExtension();
        $file->move('storage/'.$path, $filename);
        return 'storage/'.$path.'/'.$filename;
    }
# -------------------------------------------------
    public function uploadFile2($upload, $path)
    {

        return Storage::put($upload);
        $fileName = str_random(6).'_'.time().'.'.$upload->getClientOriginalExtension();
        $file = $path.'/'.$fileName;
        Storage::put('ahmed', $upload);

        return 'storage/' . $file;
    }
# -------------------------------------------------
    public function uploadBase64($base64, $extension, $path)
    {
        $fileBaseContent = base64_decode($base64);
        $fileName = str_random(10).'_'.time().'.'.$extension;
        $file = $path.'/'.$fileName;
        Storage::put('public/'.$file, $fileBaseContent);

        return 'storage/' . $file;
    }
# -------------------------------------------------
    public function sendCode($phone, $code)
    {
        // code...
    }
#    ---------------------------------------------

    public function getLang($lang = 'ar')
    {
        $lang == 'ar' ? $text = '_ar': $text = '_en';
        return $text;
    }
}
