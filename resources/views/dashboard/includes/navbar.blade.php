@php
if(Route::currentRouteName() == 'home'){
  $lang_url = route('home', App::getLocale() == 'ar' ? 'en' : 'ar');
}else {
    if (App::getLocale() == 'ar') {
      $lang_url = url( str_replace('ar/', 'en/', request()->path()) );
    }else{
      $lang_url = url( str_replace('en/', 'ar/', request()->path() ));
    }
}
@endphp
<header class="main-header" >
  <!-- Logo -->
  <a href="{{ route('home', App::getLocale() ) }}" class="logo"style="background-color: #fee2e2 !important;">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b><img style="width: 80%; height: 15%" src="{{asset('')}}admin/logo.png"></b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b><img style="width: 80%; height: 15%" src="{{asset('')}}admin/logo.png"></b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top"style="background-color: #e00a6a !important;">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu" style="{{App::getLocale() == 'ar' ? 'float:right' : ''}}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset(Auth::user()->photo) }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ asset(Auth::user()->photo) }}" class="img-circle" alt="User Image">

              <p>
                {{ Auth::user()->name }}
                {{-- <small>Member since Nov. 2012</small> --}}
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              {{-- <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div> --}}
              <div class="pull-right col-md-12 col-xs-12">
                <!--<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat col-md-12 col-xs-12">{{__('dashboard.Sign out')}}</a>-->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ $lang_url }}">
            <strong>
              {{ App::getLocale() == 'ar' ? 'En' : 'ع' }}
            </strong>
          </a>
          {{-- <form id="logout-form" action="{{ route('admin.local') }}" method="POST" style="display: none;">
          	<input type="hidden" name="lang" value="{{App::getLocale() == 'ar' ? 'en' : 'ar'}}">
            <input type="hidden" name="url" value="{{ url()->current() }}">
          	@csrf
          </form> --}}
        </li>
      </ul>
    </div>
  </nav>
</header>
