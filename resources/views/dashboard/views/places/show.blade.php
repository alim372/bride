@php
    $resource = 'places';
    $pageTitle = 'Places';
    $pageHeader = __('dashboard.Places');
    $crumbIcon = 'building';
    $breadcrumbs = [
      'Places' => '#'
    ];
    $tableCols = [
      __('dashboard.Name'),
      __('dashboard.Description'),
      __('dashboard.Photo'),
      __('dashboard.Owner'),
      __('dashboard.Category'),
      __('dashboard.Updated_at')
    ];
@endphp
@extends('dashboard.layouts.app')
@section('title', $pageTitle)
@section('content')
    @include('dashboard.components.header', ['header' => $pageHeader, 'crumbIcon' => $crumbIcon, 'breadcrumbs' => $breadcrumbs])
    <div class="content">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header with-border">
                        <h3 class="box-title">{{ $place->name }}</h3>


                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="product-img">
                                <img style="width: 200px;height:200px" src="{{ asset($place->image) }}" alt="Product Image">
                            </div>

                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                {{ $place->description }}
                            </div>
                            <div class="product-info">
                                  <span class="product-description">
                         </span>
                            </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                {{ $place->category_name }}
                             </div>
                            <div class="product-info">
                                 <span class="product-description">

                        </span>
                            </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                {{ $place->owner_name }}
                             </div>
                            <div class="product-info">

                                <span class="product-description">

                        </span>
                            </div>
                        </li>
                        <!-- /.item -->
                    </ul>
                </div>
                <!-- /.box-body -->

                <!-- /.box-footer -->
            </div>
            <div class="box-body">

                <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                    Packages
                </h4>
                 @foreach($place->place_packages as $package)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><img src="{{ asset($package->image) }}"> </span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ $package->name }}</span>
                                <span class="info-box-number">{{ $package->price }}<small>$</small></span>
                                     <ul class="chart-legend clearfix">
                                         @foreach($package->elements as $element)
                                             <li><i class="fa fa-circle-o text-red"></i> {{ $element->element }}</li>
                                         @endforeach
                                    </ul>
                             </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                @endforeach
                <h4 class="col-md-12" style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                    Offers
                </h4>

                @foreach($place->offers as $offer)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><img src="{{ asset($offer->image) }}"> </span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ $offer->description }}</span>
                                <span class="info-box-number">{{ $package->price }}<small>$</small></span>

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                @endforeach
            </div>
         </div>
    </div>
@endsection
