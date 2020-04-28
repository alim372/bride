@php
$resource = 'users';
$pageTitle = 'User Profile';
$pageHeader = 'User Profile - ' . $item->name;
$crumbIcon = 'user';
$breadcrumbs = [
  'Users'   => 'users.index',
  'Profile' => '#'
];
$tableCols = ['Name', 'Username', 'Phone', 'Status'];
@endphp
@extends('dashboard.layouts.app')
@section('title', $pageTitle)
@section('content')
@include('dashboard.components.header', ['header' => $pageHeader, 'crumbIcon' => $crumbIcon, 'breadcrumbs' => $breadcrumbs])
<div class="col-xs-12">
<div class="box box-info">
  <div class="box-header with-border">
    <i class="fa fa-fw fa-{{$crumbIcon}}"> </i> {{$pageHeader}}</h3>
  </div>
  <div class="box-body">
    Ahmed
  </div>
</div>
</div>

@endsection
