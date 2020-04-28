<?php

namespace App\Http\Controllers\WebService;

use App\Ad;
use App\Category;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class SettingController extends Controller
{
    public function getSetting(Request $request)
    {
        $text = $this->getLang($request->lang);
        $data = Setting::select('id',"about$text as about","terms$text as terms",'mobile')->orderby('id','DESC')->first();

        return $this->successResponse($data);
    }
}
