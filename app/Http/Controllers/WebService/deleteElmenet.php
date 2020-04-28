<?php

namespace App\Http\Controllers\WebService;

use App\Element;
 use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class deleteElmenet extends Controller
{
    public function deleteElmenet (Request $request)
    {
        $text = $this->getLang($request->lang);
        
        if(Element::where('id',$request->element_id)->delete()){
                    return $this->successResponse(Null,"تم المسح");

        }else{
                 return $this->successResponse(Null,"لم يتم المسح");
   
        }
    }
}
