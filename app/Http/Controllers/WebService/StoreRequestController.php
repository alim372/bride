<?php

namespace App\Http\Controllers\WebService;

use App\Http\Controllers\Controller;
use App\StoreRequest;
use Illuminate\Http\Request;

class StoreRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'message' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'lang' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        $errors = $this->formatErrors($validator->errors());
        if($validator->fails()) {return $this->errorResponse($errors);}
        $store = new StoreRequest();
        $store->name = $request->name;
        $store->message = $request->message;
        $store->category_id = $request->category_id;
        $store->phone = $request->mobile;
        $store->save();
        return $this->successResponse(Null, "تم استقبال طلبكم وسوف يتم التواصل معكم خلال الـ 24 ساعة القادمة");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StoreRequest  $storeRequest
     * @return \Illuminate\Http\Response
     */
    public function show(StoreRequest $storeRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoreRequest  $storeRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreRequest $storeRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoreRequest  $storeRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreRequest $storeRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoreRequest  $storeRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreRequest $storeRequest)
    {
        //
    }
}
