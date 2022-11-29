<?php
$menu = config('menu');
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{url('../admin123')}}/dist/img/long.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Hello world</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{url('../admin123')}}/dist/img/long.jpg" class="img-circle elevation-2" alt="User Image">
        <a href="" class="simple-text">
          @if(session()->has('infoUser'))
          <?php $info = session()->get('infoUser') ?> {{$info['name']}}
          @else
          YOU DON'T LOGIN
          @endif
        </a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach($menu as $m)
        <li class="nav-item has-treeview">
          <a href="{{route($m['route'])}}" class="nav-link">
            <i class="nav-icon fas {{($m['icon'])}}"></i>
            <p>
              {{$m['label']}}
              @if(isset($m['items']))
              <i class="right fas fa-angle-left"></i>
              @endif
            </p>
          </a>
          @if(isset($m['items']))
          <ul class="nav nav-treeview">
            @foreach($m['items'] as $mit)
            <li class="nav-item">
              <a href="{{route($mit['route'])}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{$mit['label']}}</p>
              </a>
            </li>
            @endforeach
          </ul>
          @endif
        </li>
        @endforeach

      </ul>
    </nav>
  </div>
</aside>
<div class="content-wrapper">