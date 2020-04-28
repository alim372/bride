<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Hash;
use Flashy;
use Validator;
use App\Admin;

class AdminController extends Controller
{
    private $resource = 'admins';

    public function index($lang)
    {
        $data = Admin::latest()->paginate(8);
        return view('dashboard.views.' .$this->resource. '.index', compact('data'));
    }

    public function create()
    {
      return view('dashboard.views.' .$this->resource. '.create');
    }

    public function store(Request $request)
    {
        $request = $request->all();
        if(isset($request['photo'])){
          $request['photo'] = $this->uploadFile($request['photo'], 'admins');
        }
        Admin::create($request);
        Flashy::primary('The user has been created');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function show($lang, $id)
    {
        $item = Admin::findOrFail($id);
        return view('dashboard.views.' .$this->resource. '.show', compact('item'));
    }

    public function edit($lang, $id)
    {
        $item = Admin::findOrFail($id);
        return view('dashboard.views.' .$this->resource. '.edit', compact('item'));
    }

    public function update(Request $request, $lang, $id)
    {
        $request = $request->all();
        if(isset($request['photo'])){
          $request['photo'] = $this->uploadFile($request['photo'], 'admins');
        }
        Admin::findOrFail($id)->update($request);
        Flashy::primary('The admin has been updated');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function destroy($lang, $id)
    {
        Admin::findOrFail($id)->delete();
        Flashy::primary('The user has been removed');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function search(Request $request)
    {
        App::setLocale($request->lang);
        $data = Admin::where('name', 'LIKE', '%'.$request->text.'%')
                     ->orWhere('email', 'LIKE', '%'.$request->text.'%')
                     ->paginate(8);

        return view('dashboard.views.' .$this->resource. '.index', compact('data'));
    }
}
