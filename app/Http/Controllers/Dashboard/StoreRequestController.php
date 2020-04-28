<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Hash;
use Flashy;
use Validator;
use App\StoreRequest;

class StoreRequestController extends Controller
{
    private $resource = 'store_requests';

    public function index($lang)
    {
         if(App::getLocale() == 'ar') {
            $text = '_ar';
        }else{
            $text = '_en';
        }
        $data = StoreRequest::select('store_requests.*',"categories.name$text as category_name")
            ->join('categories','store_requests.category_id','categories.id')
            ->latest()->paginate(8);
         return view('dashboard.views.' .$this->resource. '.index', compact('data'));
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
        //
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
