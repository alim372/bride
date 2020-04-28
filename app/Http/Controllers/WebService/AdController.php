<?php

namespace App\Http\Controllers\WebService;

use App\Ad;
use App\Category;
 use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class AdController extends Controller
{
    public function getAds(Request $request)
    {
        $text = $this->getLang($request->lang);
        $data['ads'] = Ad::select('id',"link","image",'title')->orderby('id','DESC')->get();
        foreach ($data['ads'] as $item){
            $item->image = asset('').$item->image;
        }
        return $this->successResponse($data);
    }
}
