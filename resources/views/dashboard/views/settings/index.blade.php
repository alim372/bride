@php
$resource = 'settings';
$pageTitle = 'Settings';
$pageHeader = __('dashboard.Settings');
$crumbIcon = 'user-secret';
$breadcrumbs = [
  'Setting' => '#'
];
$tableCols = [
  __('dashboard.About'),
   __('dashboard.Terms')
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


    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      
            <section class="content">

                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <ul class="timeline">
                            <!-- timeline time label -->
                            <li class="time-label">
                  <span class="bg-red col-lg-offset-0">
                                  <a href="{{ route($resource.'.edit', ['id' => $data->id, 'lang' => App::getLocale()]) }}" title="edit"><i class="fa fa-fw fa-edit text-yellow"></i></a>

                  </span>
                            </li>

                            <li>
                                <i class="fa  fa-exclamation bg-yellow"></i>

                                <div class="timeline-item">

                                    <h3 class="timeline-header"><a href="#">{{__('dashboard.ABOUT')}} : </a> </h3>

                                    <div class="timeline-body">
                                        {{$data->about}}
                                    </div>

                                </div>
                            </li>
                            <li>
                                <i class="fa  fa-calendar-times-o bg-green"></i>

                                <div class="timeline-item">

                                    <h3 class="timeline-header"><a href="#">{{__('dashboard.TERMS')}} : </a>  </h3>
                                    <div class="timeline-body">
                                        {{$data->terms}}
                                    </div>


                                </div>
                            </li>



                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


            </section>
     </div>

    <div class="text-center">
      
    </div>
  </div>
</div>
@endsection
