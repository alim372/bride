<?php

namespace App\Http\Controllers\Dashboard;
use App\Category;
use App\Element;
use App\Http\Controllers\Controller;
use App\Offer;
use App\Package;
use App\Place;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Flashy;

class PlaceController extends Controller
{
    private $resource = 'places';

    public function index($lang)
    {
        if(App::getLocale() == 'ar') {
            $text = '_ar';
        }else{
            $text = '_en';
        }
        $data = Place::select('places.*','places.id','places.is_best','places.name','places.image','places.updated_at','places.description',"categories.name$text as category_name",'users.name as owner_name')
            ->join('categories','places.category_id','categories.id')
            ->join('users','places.owner_id','users.id')
            ->orderBy('updated_at','DESC')
            ->paginate(8);
        return view('dashboard.views.' .$this->resource. '.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(App::getLocale() == 'ar') {
            $text = '_ar';
        }else{
            $text = '_en';
        }
        $categories = Category::select("name$text as name",'id')->get();
        return view('dashboard.views.' .$this->resource. '.create',compact('categories'));
    }

    public function store(Request $request)
    {
        //
    }


    public function show($lang, Place $place)
    {
        if(App::getLocale() == 'ar') {
            $text = '_ar';
        }else{
            $text = '_en';
        }
        $category = Category::select("name$text as name")
            ->join('places','categories.id','places.category_id')
            ->where('places.id',$place->id)
            ->first();
        $user = User::select("users.name")
            ->join('places','users.id','places.owner_id')
            ->where('places.id',$place->id)->first();
        $place->category_name = $category->name;
        $place->owner_name = $user->name;
        $place['place_packages'] = Package::select('*')->where('place_id',$place->id)->get();
        $place['place_packages']->map(function ($package) {
            $package['elements'] = Element::select('*')->where('package_id',$package->id)->get();
         });
        $place['offers'] = Offer::select('*')->where('place_id',$place->id)->get();
         return view('dashboard.views.' .$this->resource. '.show', compact('place'));

    }


    public function edit($lang, $id)
    {
        if(App::getLocale() == 'ar') {
            $text = '_ar';
        }else{
            $text = '_en';
        }
        $categories = Category::select('id',"name$text as name")->get();
        $item = Place::findOrFail($id);
        return view('dashboard.views.' .$this->resource. '.edit', compact('item','categories'));
    }


    public function update(Request $request, $lang, $id)
    {
          $place = Place::findOrFail($id);
         if(isset($request->is_best)){
             if($request->is_best == 1){
                 $place->is_best = 2;
             }else{
                 $place->is_best = 1;
             }
             $place->save();
             Flashy::primary('The Place has been updated');
             return redirect()->route($this->resource.'.index', App::getLocale());
         }

        if(isset($request->is_updated)){
            $place->name= $place->updated_name;
            $place->description= $place->updated_description;
            $place->updated_description= '';
            $place->updated_name= '';
            $place->is_updated= 1;
            $place->save();
            Flashy::primary('The Place has been updated');
            return redirect()->route($this->resource.'.index', App::getLocale());
        }
        $request = $request->all();
        if(isset($request['image'])){
            $request['image'] = $this->uploadFile($request['image'], 'places');
        }
        Place::findOrFail($id)->update($request);
        Flashy::primary('The Place has been updated');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }


    public function destroy(Place $place)
    {
        //
    }
}
