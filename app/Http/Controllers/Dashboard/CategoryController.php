<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Hash;
use Flashy;
use Validator;
use App\Category;

class CategoryController  extends Controller
{
    private $resource = 'categories';

    public function index($lang)
    {
        if(App::getLocale() == 'ar') {
            $text = '_ar';
        }else{
            $text = '_en';
        }
        $data = Category::select('id',"name$text as name",'icon')->latest()->paginate(8);
        return view('dashboard.views.' .$this->resource. '.index', compact('data'));
    }

    public function create()
    {
      return view('dashboard.views.' .$this->resource. '.create');
    }

    public function store(Request $request)
    {
        $request = $request->all();
        if(isset($request['icon'])){
          $request['icon'] = $this->uploadFile($request['icon'], 'category');
        }
        Category::create($request);
        Flashy::primary('The Category has been created');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function show($lang, $id)
    {
        $item = Category::findOrFail($id);
        return view('dashboard.views.' .$this->resource. '.show', compact('item'));
    }

    public function edit($lang, $id)
    {
        $item = Category::findOrFail($id);
        return view('dashboard.views.' .$this->resource. '.edit', compact('item'));
    }

    public function update(Request $request, $lang, $id)
    {
        $request = $request->all();
        if(isset($request['icon'])){
          $request['icon'] = $this->uploadFile($request['icon'], 'category');
        }
        Category::findOrFail($id)->update($request);
        Flashy::primary('The Category has been updated');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function destroy($lang, $id)
    {
        Category::findOrFail($id)->delete();
        Flashy::primary('The Category has been removed');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function search(Request $request)
    {
        App::setLocale($request->lang);
        $data = Category::where('name_ar', 'LIKE', '%'.$request->text.'%')
                     ->orWhere('name_en', 'LIKE', '%'.$request->text.'%')
                     ->paginate(8);

        return view('dashboard.views.' .$this->resource. '.index', compact('data'));
    }
}
