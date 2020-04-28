<div class="form-group">
  <label for="title" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Title")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('title', null, array('required', 'id' => 'title', 'placeholder'=>__('dashboard.Title'), 'class'=>'form-control'))!!}
  </div>
</div>


<div class="form-group">
  <label for="link" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Link")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('link', null, array('required', 'id' => 'link', 'placeholder'=>__('dashboard.Link'), 'class'=>'form-control'))!!}
  </div>
</div>



<div class="form-group">
  <label for="icon" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Photo")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
  {{-- <div class="{{ isset($item->image) ? 'col-sm-9' : '{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10'}}"> --}}
    {!!Form::file('image', array('class'=>'form-control', 'id' => 'image'))!!}
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
