@php
$items = array(
  [
    'route' => 'home',
    'icon'  => 'home',
    'title' => __('dashboard.DASHBOARD')
  ],
  [
    'route' => 'admins.index',
    'icon'  => 'shield',
    'title' => __('dashboard.ADMINS')
  ],
  [
    'route' => 'categories.index',
    'icon'  => 'home',
    'title' => __('dashboard.CATEGORIES')
  ],
[
    'route' => 'ads.index',
    'icon'  => 'home',
    'title' => __('dashboard.ADS')
  ],
  [
    'route' => 'places.index',
    'icon'  => 'building',
    'title' => __('dashboard.PLACES')
  ],
  [
    'route' => 'users.index',
    'icon'  => 'users',
    'title' => __('dashboard.USERS')
  ],
[
    'route' => 'store_requests.index',
    'icon'  => 'users',
    'title' => __('dashboard.store_requests')
  ],
   [
    'route' => 'settings.index',
    'icon'  => 'video-camera',
    'title' => __('dashboard.SETTINGS')
  ],
  // [
  //   'route' => NULL,
  //   'icon'  => 'bell',
  //   'title' => 'NOTIFICATIONS'
  // ],
  /*[
    'route' => 'sliders.index',
    'icon'  => 'film',
    'title' => __('dashboard.SLIDER')
  ],
  [
    'route' => 'settings.index',
    'icon'  => 'cogs',
    'title' => __('dashboard.SETTINGS')
  ],*/

);
@endphp
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      @foreach ($items as $item)
        <li >
          <a class="hover_item" href=" {{ $item['route'] == NULL ? '#' : route($item['route'], App::getLocale()) }} ">
            <i class="fa fa-{{$item['icon']}}"></i>
            <span>{{ $item['title'] }}</span>
          </a>
        </li>
      @endforeach

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
