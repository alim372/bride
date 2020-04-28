@php
    $resource = 'messages';
    $pageTitle = 'Messages';
    $pageHeader = __('dashboard.Messages');
    $crumbIcon = 'user';
    $breadcrumbs = [
      'Messages' => '#'
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
        <div class="row">
            <div class="col-md-12">
                <!-- DIRECT CHAT -->
                <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Direct Chat</h3>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">
                            <!-- Message. Default to the left -->
                            <!-- /.direct-chat-msg -->
                                @foreach($data as $item)
                                <div class="@if($item->sender_id) direct-chat-msg @else direct-chat-msg right @endif">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name @if($item->sender_id)pull-left @else pull-right @endif">@if($item->sender_id) {{ $item->user_name }} @else {{ \Illuminate\Support\Facades\Auth::user()->name }} @endif</span>
                                        <span class="direct-chat-timestamp @if($item->sender_id) pull-right @else pull-left @endif">{{ $item->created_at }}</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="{{ asset('') }}admin/user.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text @if($item->sender_id)pull-left @else pull-right @endif">
                                        {{ $item->message }}
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>

                        @endforeach
                            <!-- Message to the right -->
                             <!-- /.direct-chat-msg -->



                        </div>
                        <!--/.direct-chat-messages-->

                        <!-- Contacts are loaded here -->
                         <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{ Form::open(array('route'=>['messages.store', App::getLocale()],'files'=>true)) }}

                            {{--<input type="hidden" name="csrf_token" value="{{ csrf_token() }}">--}}
                            <div class="input-group">
                                <input required type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <input required type="hidden" value="{{ $id }}" name="user_id" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-flat">Send</button>
                          </span>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
        </div>

        </div>
    </div>
@endsection
