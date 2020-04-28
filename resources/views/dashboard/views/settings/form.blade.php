<div class="form-group">
  <label for="name" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.About_Ar")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('about_ar', null, array('required', 'id' => 'about_ar', 'placeholder'=>__('dashboard.About_Ar'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
  <label for="name" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.About_En")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('about_en', null, array('required', 'id' => 'about_en', 'placeholder'=>__('dashboard.About_En'), 'class'=>'form-control'))!!}
  </div>
</div>



<div class="form-group">
  <label for="name" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Terms_Ar")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('terms_ar', null, array('required', 'id' => 'terms_ar', 'placeholder'=>__('dashboard.Terms_Ar'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
  <label for="name" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Terms_En")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('terms_en', null, array('required', 'id' => 'terms_en', 'placeholder'=>__('dashboard.Terms_En'), 'class'=>'form-control'))!!}
  </div>
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
