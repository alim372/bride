<?php

namespace App\Http\Controllers\WebService;

use App\Element;
use App\Http\Controllers\Controller;
use App\Package;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['packages'] = Package::select('name','image','price', 'id')->where('place_id',$request->place_id)->get();
        foreach ($data['packages'] as $item)
        {
            $item->image = asset('').$item->image;
            $item->items = Element::select('element')->where('package_id',$item->id)->pluck('element');
        }
        return $this->successResponse($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required',
            'image' => 'required',
            'image_ex' => 'required',
             'lang' => 'required|string|max:255',
         ]);

        $errors = $this->formatErrors($validator->errors());
        if($validator->fails()) {return $this->errorResponse($errors);}
        $package = new Package();
        if($request->image){
            $package->image = $this->uploadBase64($request->image, $request->image_ex, 'packages');
        }
        $place = Place::where('owner_id',Auth::user()->id)->first();
        $package->name = $request->name;
        $package->price = $request->price;
        $package->place_id = $place->id;
        $package->save();
        if($request->elements){
            foreach ($request->elements as $element){
                $elm = new Element();
                $elm->element = $element;
                $elm->package_id = $package->id;
                $elm->save();
            }
        }
        return $this->successResponse($package, "تم الاضافة بنجاح");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function editPackage(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'package_id' => 'required',
            'name' => 'string|max:255',
             'lang' => 'required|string|max:255',
         ]);

        $errors = $this->formatErrors($validator->errors());
        if($validator->fails()) {return $this->errorResponse($errors);}
        $package =  Package::find($request->package_id);
        if($request->image){
            $package->image = $this->uploadBase64($request->image, $request->image_ex, 'packages');
        }
        $place = Place::where('owner_id',Auth::user()->id)->first();
        $package->name = $request->name;
        $package->price = $request->price;
        $package->place_id = $place->id;
        $package->save();
        if($request->elements){
            foreach ($request->elements as $element){
                $elm = new Element();
                $elm->element = $element;
                $elm->package_id = $package->id;
                $elm->save();
            }
        }
        return $this->successResponse($package, "تم التعديل بنجاح");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
