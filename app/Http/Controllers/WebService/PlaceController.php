<?php

namespace App\Http\Controllers\WebService;

use App\Category;
use App\Place_image;
use App\Element;
use App\Offer;
use App\Place_rate;
use App\Package;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class PlaceController extends Controller
{
    public function getAllPlaces (Request $request){
        $text = $this->getLang($request->lang);
        $data['places'] = Place::select('id',"name", 'image','is_best', 'category_id')
            ->where('category_id',$request->category_id)
            ->orderby('id','DESC')->get();
        foreach ($data['places'] as $item){
            $item->image = asset('').$item->image;
            $item->category_id = (integer) $item->category_id;
            if($item->is_best == 2){
                $item->is_best = true;
            }else{
                $item->is_best = false;
            }
             $item->rate  = Place_rate::where('place_id',$item->id)->avg('rate');
            $item->rate == Null?$item->rate=0:$item->rate = (integer) $item->rate;

        }
        return $this->successResponse($data);
    }
    public function getPlaces (Request $request)
    {
         $text = $this->getLang($request->lang);
        $data['places'] = Place::select('id',"name", 'image','is_best')
            ->where('category_id',$request->category_id)
            ->orderby('id','DESC')->paginate($this->limit);
        foreach ($data['places'] as $item){
            $item->image = asset('').$item->image;
            if($item->is_best == 2){
                $item->is_best = true;
            }else{
                $item->is_best = false;
            }
   $item->rate  = Place_rate::where('place_id',$item->id)->avg('rate');
            $item->rate == Null?$item->rate=0:$item->rate = (integer) $item->rate;
            }
        return $this->successResponse($data);
    }


    
    public function placeDetail(Request $request)
    {
        $text = $this->getLang($request->lang);
        $data = Place::select('id',"name", 'image','is_best','description')
            ->where('id',$request->id)
            ->first();
        $data->image = asset('').$data->image;
        if($data->is_best == 2){
            $data->is_best = true;
        }else{
            $data->is_best = false;
        }
        $data->images = Place_image::select('image')->where('place_id',$data->id)->pluck('image');
        foreach ($data->images as $item)
        {
            $item = asset('').$item;
        }
    $data->rate  = Place_rate::where('place_id',$data->id)->avg('rate');
            $data->rate == Null?$data->rate=0:$data->rate = (integer) $data->rate;
        $data->offers_count = Offer::where('place_id',$data->id)->count();
        $data->packages = Package::select('name','image','price', 'id')->where('place_id',$data->id)->get();
        foreach ($data->packages as $item)
        {
            $item->image = asset('').$item->image;
            $item->items = Element::select('element')->where('package_id',$item->id)->pluck('element');
        }
        return $this->successResponse($data);

    }

    public function placeOffers(Request $request)
    {
        $data['offers'] = Offer::select('id', 'image','price','description','name')
            ->where('place_id',$request->place_id)
            ->paginate($this->limit);
        foreach ($data['offers'] as $item){
            $item->image = asset('').$item->image;
        }
        return $this->successResponse($data);
    }
    
    
    
    
    
    public function editPlace(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'place_id' => 'required',
            'name' => 'string|max:255',
             'lang' => 'required|string|max:255',
         ]);

        $errors = $this->formatErrors($validator->errors());
        if($validator->fails()) {return $this->errorResponse($errors);}
        $place =  Place::find($request->place_id);
        if($request->image){
            $place->image = $this->uploadBase64($request->image, $request->image_ex, 'packages');
        }
         $place->updated_name = $request->name;
        $place->updated_description	 = $request->description;
        $place->save();
        if($request->images){
            foreach ($request->images as $image){
                $image = new Place_image();
                $image->image = $this->uploadBase64($request->image, $request->image_ex, 'packages');                
                $image->place_id = $request->place_id;
                $image->save();
            }
        }
        return $this->successResponse($place, "تم التعديل بنجاح");

    }
}
