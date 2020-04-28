<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Hash;
use Flashy;
use Validator;
use App\Ad;

class AdController extends Controller
{
    private $resource = 'ads';

    public function index($lang)
    {
        
        $data = Ad::select('id','link','image','title')->latest()->paginate(8);
        return view('dashboard.views.' .$this->resource. '.index', compact('data'));//
    }

    public function create()
    {
      return view('dashboard.views.' .$this->resource. '.create');
    }

    public function store(Request $request)
    {
        $request = $request->all();
        if(isset($request['image'])){
          $request['image'] = $this->uploadFile($request['image'], 'ads');
        }
        Ad::create($request);
        Flashy::primary('The Ad has been created');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function show($lang, $id)
    {
        
    }

    public function edit($lang, $id)
    {
        $item = Ad::findOrFail($id);
        return view('dashboard.views.' .$this->resource. '.edit', compact('item'));
    }

    public function update(Request $request, $lang, $id)
    {
        $request = $request->all();
        if(isset($request['image'])){
          $request['image'] = $this->uploadFile($request['image'], 'ads');
        }
        Ad::findOrFail($id)->update($request);
        Flashy::primary('The Ad has been updated');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function destroy($lang, $id)
    {
        Ad::findOrFail($id)->delete();
        Flashy::primary('The Ad has been removed');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function search(Request $request)
    {
        // App::setLocale($request->lang);
        // $data = Ad::where('name_ar', 'LIKE', '%'.$request->text.'%')
        //              ->orWhere('name_en', 'LIKE', '%'.$request->text.'%')
        //              ->paginate(8);

        // return view('dashboard.views.' .$this->resource. '.index', compact('data'));
    }
}
