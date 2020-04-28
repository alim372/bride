<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['offers'] = Offer::select('id', 'image','price','description','name')
             ->get();
        foreach ($data['offers'] as $item){
            $item->image = asset('').$item->image;
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
             'name' => 'required|string',
             'description' => 'required|string',
            'price' => 'required',
            'image' => 'required',
            'image_ex' => 'required',
            'lang' => 'required|string|max:255',
        ]);

        $errors = $this->formatErrors($validator->errors());
        if($validator->fails()) {return $this->errorResponse($errors);}
        $place = Place::where('owner_id',Auth::user()->id)->first();
        $offer = new Offer();
        if($request->image){
            $offer->image = $this->uploadBase64($request->image, $request->image_ex, 'offers');
        }
        $offer->name = $request->name;
        $offer->price = $request->price;
         $offer->description = $request->description;
        $offer->place_id = $place->id;
        $offer->save();
        return $this->successResponse($offer, "تم الاضافة بنجاح");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
