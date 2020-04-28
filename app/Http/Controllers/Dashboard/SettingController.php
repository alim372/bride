<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Flashy;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $resource = 'settings';
    public function index()
    {
        if(App::getLocale() == 'ar') {
            $text = '_ar';
        }else{
            $text = '_en';
        }
        $data = Setting::select('id',"about$text as about","terms$text as terms")->latest()->first();
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
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $item = Setting::findOrFail($id);
        return view('dashboard.views.' .$this->resource. '.edit', compact('item'));
    }

    public function update(Request $request, $lang, $id)
    {
        $request = $request->all();
        Setting::findOrFail($id)->update($request);
        Flashy::primary('The Category has been updated');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
