@php
$pageHeader = 'Dashboard';
$crumbIcon = 'home';
$breadcrumbs = [
  'Dashboard' => '#'
];
$boxes = [
  [
    'title' => __('dashboard.Admins'),
    'icon'  => 'person',
    'color' => 'aqua',
    'data'  => $statistics['admins'],
    'route' => 'admins'
  ],
 [
    'title' => __('dashboard.Categories'),
    'icon'  => 'ios-film',
    'color' => 'aqua',
    'data'  => $statistics['categories'],
    'route'  => 'categories'
  ],
  [
    'title' => __('dashboard.Users'),
    'icon'  => 'person-stalker',
    'color' => 'aqua',
    'data'  => $statistics['users'],
    'route'  => 'users'
  ],
   [
    'title' => __('dashboard.Places'),
    'icon'  => 'ios-home',
    'color' => 'aqua',
    'data'  => $statistics['places'],
    'route'  => 'places'
  ],
   /*[
    'title' => __('dashboard.Views'),
    'icon'  => 'eye',
    'color' => 'aqua',
    'data'  => $statistics['views'],
    'route'  => 'videos'
  ],
  [
    'title' => __('dashboard.Likes'),
    'icon'  => 'thumbsup',
    'color' => 'aqua',
    'data'  => $statistics['likes'],
    'route'  => 'videos'
  ],
  [
    'title' => __('dashboard.Comments'),
    'icon'  => 'chatboxes',
    'color' => 'aqua',
    'data'  => $statistics['comments'],
    'route'  => 'videos'
  ],
  [
    'title' => __('dashboard.Follows'),
    'icon'  => 'person-add',
    'color' => 'aqua',
    'data'  => '23',
    'route'  => 'users'
  ],*/
];
@endphp
@extends('dashboard.layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
@include('dashboard.components.header', ['header' => $pageHeader, 'crumbIcon' => $crumbIcon, 'breadcrumbs' => $breadcrumbs])
<section class="content">
  <div class="row">

    @foreach ($boxes as $box)
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-{{$box['color']}}" style="background-color: #e00a6a !important;">
          <div class="inner">
            <h3>{{$box['data']}}</h3>

            <p>{{$box['title']}}</p>
          </div>
          <div class="icon">
            <i class="ion ion-{{$box['icon']}}"></i>
          </div>
          <a href="{{ route($box['route'].'.index', App::getLocale()) }}" class="small-box-footer"> {{__('dashboard.More info')}} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    @endforeach

  </div>
</section>
@endsection
