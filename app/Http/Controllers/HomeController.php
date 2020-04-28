<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Place;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = [
            'admins'   => Admin::count(),
            'categories'   => Category::count(),
            'places'   => Place::count(),
            'users'   => User::count(),
        ];
            return view('dashboard.home', compact('statistics'));
        return view('home');
    }
}
