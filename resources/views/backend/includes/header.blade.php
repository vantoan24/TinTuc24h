<!--Start topbar header-->
<header class="topbar-nav">
  <nav class="navbar navbar-expand fixed-top">
    <ul class="navbar-nav mr-auto align-items-center">
      <li class="nav-item">
        <a class="nav-link toggle-menu" href="javascript:void();">
          <i class="icon-menu menu-icon"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav align-items-center right-nav-link">
      <li class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" href="{{ route('email.index')}}">
          <i class="fa fa-envelope-open-o"></i></a>
      </li>
      <li  class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" href="{{ route('comments.index')}}">
          <i class="fa fa-comments"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
          <span class="user-profile"> <img src="{{asset($current_user->avatar)}}" style="width:55px; height:45px" alt=""></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item user-details">
            <a href="javaScript:void();">
              <div class="media">
                <div class="avatar"> <img src="{{asset($current_user->avatar)}}" style="width:55px; height:45px" alt=""></div>
                <div class="media-body">
                  <a href="{{ route('users.index',$current_user->id)}}" class="account-name">{{ $current_user->name}}</a>
                  <p class="user-subtitle">{{ $current_user->userGroup->name }}</p>
                </div>
              </div>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <a href="{{route('users.update',$current_user->id)}}/edit" <li class="dropdown-item"><i class="icon-settings mr-2"></i>Thông tin cá nhân
      </li></a>
      <li class="dropdown-divider"></li>
      <li class="dropdown-divider"></li>
      <a <li class="dropdown-item" href="{{ route('logout') }}"><i class="icon-power mr-2"></i>Thoát</li></a>
    </ul>
    </li>
    </ul>
  </nav>
</header>