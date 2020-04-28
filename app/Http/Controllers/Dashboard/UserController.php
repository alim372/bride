<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Hash;
use Flashy;
use Validator;
use App\User;

class UserController extends Controller
{
    private $resource = 'users';

    public function index($lang)
    {
        $data = User::latest()->paginate(8);
        return view('dashboard.views.' .$this->resource. '.index', compact('data'));
    }

    public function create()
    {
      return view('dashboard.views.' .$this->resource. '.create');
    }

    public function store(Request $request)
    {
        $request = $request->all();

        User::create($request);
        Flashy::primary('The user has been created');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function show($lang, $id)
    {
         $data = App\Message::select('messages.*','users.name as user_name')
            ->join('users','messages.user_id','users.id')
            ->where('user_id',$id)->get();
         return view('dashboard.views.' .$this->resource. '.show', compact('data','id'));
    }

    public function edit($lang, $id)
    {
        $item = User::findOrFail($id);
        return view('dashboard.views.' .$this->resource. '.edit', compact('item'));
    }

    public function update(Request $request, $lang, $id)
    {
        $request = $request->all();
        User::findOrFail($id)->update($request);
        Flashy::primary('The admin has been updated');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function destroy($lang, $id)
    {
        User::findOrFail($id)->delete();
        Flashy::primary('The user has been removed');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

    public function search(Request $request)
    {
        App::setLocale($request->lang);
        $data = User::where('name', 'LIKE', '%'.$request->text.'%')
                     ->orWhere('email', 'LIKE', '%'.$request->text.'%')
                     ->paginate(8);

        return view('dashboard.views.' .$this->resource. '.index', compact('data'));
    }
}
