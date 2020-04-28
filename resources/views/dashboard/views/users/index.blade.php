@php
$resource = 'users';
$pageTitle = 'Users';
$pageHeader = __('dashboard.Users');
$crumbIcon = 'user';
$breadcrumbs = [
  'Users' => '#'
];
$tableCols = [
  __('dashboard.Name'),
  __('dashboard.Phone'),
  __('dashboard.Type')
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
              <td>{{ $item->name }}</td>
              <td>{{ $item->mobile }}</td>
              <td>{{ $item->type }}</td>

              <td>
                <a href="{{ route($resource.'.show',['lang'=>App::getLocale(), 'id'=>$item->id]) }}" title="show"><i class="fa fa-fw fa-eye text-light-blue"></i></a>

                {{-- <a href="{{ route($resource.'.show', $item->id) }}" title="show"><i class="fa fa-fw fa-eye text-light-blue"></i></a> --}}
{{--                <a href="{{ route($resource.'.edit', ['id' => $item->id, 'lang' => App::getLocale()]) }}" title="edit"><i class="fa fa-fw fa-edit text-yellow"></i></a>--}}
                <a href="#" data-toggle="modal" data-target="#danger_{{$item->id}}" title="Delete"><i class="fa fa-fw fa-trash text-red"></i></a>

              </td>
            </tr>
            @include('dashboard.components.dangerModal', ['user_name' => $item->name, 'id' => $item->id, 'resource' => $resource])
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
