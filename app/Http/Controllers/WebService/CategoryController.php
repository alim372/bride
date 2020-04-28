<?php

namespace App\Http\Controllers\WebService;

use App\Category;
 use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class CategoryController extends Controller
{
    public function getCategories (Request $request)
    {
        $text = $this->getLang($request->lang);
        $data['categories'] = Category::select('id',"name$text as name", 'icon')->orderby('id','DESC')->get();
        foreach ($data['categories'] as $item){
            $item->icon = asset('').$item->icon;
        }
        return $this->successResponse($data);
    }
}
