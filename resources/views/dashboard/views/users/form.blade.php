<div class="form-group">
  <label for="name" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Name")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('name', null, array('required', 'id' => 'name', 'placeholder'=>__('dashboard.Name'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
  <label for="email" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__('dashboard.Email')}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::email('email', null, array('required', 'id' => 'email', 'placeholder'=>__('dashboard.Email'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
  <label for="password" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Password")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('password', isset($item->password) ? '******' : NULL, array('required', 'id' => 'password', 'placeholder'=>__('dashboard.Password'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
  <label for="photo" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Photo")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
  {{-- <div class="{{ isset($item->photo) ? 'col-sm-9' : '{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10'}}"> --}}
    {!!Form::file('photo', array('class'=>'form-control', 'id' => 'photo'))!!}
  </div>
  {{-- @if(isset($item->photo))
  <div class="col-sm-1">
    <a data-toggle="modal" data-target="#img_modal_{{$item->id}}" title="Old Photo">
      <i class="fa fa-fw fa-image" style="font-size:35px"> </i>
    </a>
  </div>
  @include('dashboard.components.imageModal', ['id' => $item->id,'img' => $item->photo])

  @endif --}}
</div>
