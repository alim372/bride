<div class="form-group">
  <label for="name" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Name_Ar")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('name_ar', null, array('required', 'id' => 'name_ar', 'placeholder'=>__('dashboard.Name_Ar'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
  <label for="name" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Name_En")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('name_en', null, array('required', 'id' => 'name_en', 'placeholder'=>__('dashboard.Name_En'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
  <label for="icon" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Icon")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
  {{-- <div class="{{ isset($item->photo) ? 'col-sm-9' : '{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10'}}"> --}}
    {!!Form::file('icon', array('class'=>'form-control', 'id' => 'icon'))!!}
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
