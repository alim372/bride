<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Hash;
use Flashy;
use Validator;
use App\Message;

class MessageController  extends Controller
{
    private $resource = 'messages';

    public function index($lang)
    {

    }

    public function create()
    {
//      return view('dashboard.views.' .$this->resource. '.create');
    }

    public function store(Request $request)
    {
        $id = $request->user_id;
         $request = $request->all();
        Message::create($request);
        Flashy::primary('The Message has been Sent');
        return redirect()->route('users.show',['lang'=>App::getLocale(), 'id'=>$id]);
    }

    public function show($lang, $id)
    {

    }



    public function destroy($lang, $id)
    {
        Category::findOrFail($id)->delete();
        Flashy::primary('The Category has been removed');
        return redirect()->route($this->resource.'.index', App::getLocale());
    }

 }
