<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;
use App\Place_rate;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class addRate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

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
    public function addRate(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
             'rate' => 'required|integer',
             'place_id' => 'required|integer',
             
             'lang' => 'required|string|max:255',
        ]);

        $errors = $this->formatErrors($validator->errors());
        if($validator->fails()) {return $this->errorResponse($errors);}
        
        if(Place_rate::where('user_id',Auth::user()->id)->where('place_id', $request->place_id)){
                    return $this->successResponse(Null, "تم التقييم مسبقاً");

        }
         $rate = new Place_rate();
    
        $rate->rate = $request->rate;
        $rate->place_id = $request->place_id;
         $rate->user_id = Auth::user()->id;
         $rate->save();
        return $this->successResponse(Null, "تم التقييم بنجاح");

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
