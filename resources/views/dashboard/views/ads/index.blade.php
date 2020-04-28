@php
$resource = 'ads';
$pageTitle = 'Ads';
$pageHeader = __('dashboard.Ads');
$crumbIcon = 'building';
$breadcrumbs = [
  'Ad' => '#'
];
$tableCols = [
  __('dashboard.Title'),
  __('dashboard.Link'),
  __('dashboard.Photo'),
 ];
@endphp
@extends('dashboard.layouts.app')
@section('title', $pageTitle)
@section('content')
@include('dashboard.components.header', ['header' => $pageHeader, 'crumbIcon' => $crumbIcon, 'breadcrumbs' => $breadcrumbs])
<div class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-fw fa-{{$crumbIcon}}"> </i> {{$pageHeader}}</h3>

      <div class="box-tools">
        <form class="input-group input-group-sm" style="width: 150px;" action="{{route($resource.'.search', ['lang' => App::getLocale()])}}" method="post">
          {{ csrf_field() }}
          <input type="text" name="text" class="form-control pull-right" placeholder="{{__('dashboard.Search')}}" style="width:150px">
          <div class="input-group-btn">
            <button type="submit" class="btn btn-default" title="Search"><i class="fa fa-search"></i></button>
            <a href="{{route($resource.'.create', ['lang' => App::getLocale()])}}" class="btn btn-default" title="New Item"><i class="fa fa-plus"></i></a>
          </div>
        </form>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      @if(count($data) == 0)
        <div class="col-xs-12">
          <h4> {{ __('dashboard.No Data') }}</h4>
          <p>{{ __('dashboard.Add Link') }}  <b><a href="{{route($resource.'.create', App::getLocale())}}">{{ __('dashboard.here') }}</a></b>.</p>
        </div>
      @else
        <table class="table table-hover">
          <tr>
            @foreach($tableCols as $col)
              <td><strong>{{ $col }}</strong></td>
            @endforeach
            <td><strong>{{__('dashboard.Actions')}}</strong></td>
          </tr>

          @foreach($data as $item)
            <tr>
              <td>{{ $item->title }}</td>
              <td><a target="_blank" href="{{ $item->link }}">{{ $item->link }}</a></td>
               <td>
                @if($item->image == NULL)
                  <i class="fa fa-fw fa-image"> </i>
                @else
                  <a href="#" data-toggle="modal" data-target="#img_modal_{{$item->id}}" title="image">
                    <i class="fa fa-fw fa-image"> </i>
                  </a>
                @endif
             
              </td>
              <td>

                <a href="{{ route($resource.'.edit', ['id' => $item->id, 'lang' => App::getLocale()]) }}" title="edit"><i class="fa fa-fw fa-edit text-yellow"></i></a>
                <a href="#" data-toggle="modal" data-target="#danger_{{$item->id}}" title="Delete"><i class="fa fa-fw fa-trash text-red"></i></a>

              </td>
            </tr>
            @include('dashboard.components.dangerModal', ['user_name' => $item->name, 'id' => $item->id, 'resource' => $resource])
            @include('dashboard.components.imageModal', ['id' => $item->id,'img' => $item->image])
          @endforeach

        </table>
      @endif
    </div>

    <div class="text-center">
      {{ $data->links() }}
    </div>
  </div>
</div>
@endsection
