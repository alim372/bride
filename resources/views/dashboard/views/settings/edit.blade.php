@php
$resource = 'settings';
$pageTitle = 'Edit Setting';
$pageHeader = __('dashboard.Edit') . ' ' . __('dashboard.Settings') . ' - ';
$crumbIcon = 'user-secret';
$breadcrumbs = [
  'Settings' => 'settings.index',
  'Edit' => '#'
];
@endphp
@extends('dashboard.layouts.app')
@section('title', $pageTitle)
@section('content')
@include('dashboard.components.header', ['header' => $pageHeader, 'crumbIcon' => $crumbIcon, 'breadcrumbs' => $breadcrumbs])
<div class="content">
<div class="box box-info">
  <div class="box-header with-border">
    <i class="fa fa-fw fa-{{$crumbIcon}}"> </i> {{$pageHeader}}</h3>
  </div>
    {{ Form::model($item, array('method' => 'PATCH', 'route' => [$resource . '.update', App::getLocale(), $item->id], 'class' => 'form-horizontal', 'files' => true)) }}
      <div class="box-body">
        @include('dashboard.views.' .$resource. '.form')
      </div>
      <div class="box-footer">
        <a style="background-color: #e00a6a !important;" href="{{route($resource.'.index', App::getLocale())}}" class="btn btn-info col-md-1" style="margin-left:10px">Cancel</a>
        <button style="background-color: #e00a6a !important;" type="submit" class="btn btn-info pull-right col-md-1">OK</button>
      </div>
    {!!Form::close()!!}
</div>
</div>

@endsection
