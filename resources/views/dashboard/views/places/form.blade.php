<div class="form-group">
  <label for="Name_Ar" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__("dashboard.Name")}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('name', null, array('required', 'id' => 'Name', 'placeholder'=>__('dashboard.Name'), 'class'=>'form-control'))!!}
  </div>
</div>

<div class="form-group">
  <label for="Description" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__('dashboard.Description')}}</label>
  <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
    {!!Form::text('description', null, array('required', 'id' => 'Description', 'placeholder'=>__('dashboard.Description'), 'class'=>'form-control'))!!}
  </div>
</div>

   <div class="form-group">
    <label for="Name_En" class="{{App::getLocale() == 'ar' ? 'col-md-push-10' : ''}} col-sm-2 control-label">{{__('dashboard.Categories')}}</label>
    <div class="{{App::getLocale() == 'ar' ? 'col-md-pull-2' : ''}} col-sm-10">
  <select class="form-control" name="category_id">
    @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
  </select>
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
