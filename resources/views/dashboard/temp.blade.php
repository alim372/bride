@php
$pageHeader = 'Dashboard';
$crumbIcon = 'home';
$breadcrumbs = [
  'Dashboard' => '#'
];
@endphp
@extends('dashboard.layouts.app_panel')
@section('title', 'Admin Dashboard')
@section('header')
@include('dashboard.components.header', ['header' => $pageHeader, 'crumbIcon' => $crumbIcon, 'breadcrumbs' => $breadcrumbs])
@endsection
@section('box')
  Ahe
@endsection
