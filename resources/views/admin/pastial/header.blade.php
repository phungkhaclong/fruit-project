<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{route('user.home')}}" class="nav-link">Home</a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('getLogout')}}">
        <span class="no-icon">Log out</span>
      </a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">

  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto" style="padding-right: 50px;">
    <!-- Navbar Search -->
    <li>
      <form action="" class="form-inline ">
        <div class="form-group ">
          <input class="form-control " name="key" placeholder="Search by name.." style="width: 350px;">
        </div>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </li>

  </ul>
</nav>