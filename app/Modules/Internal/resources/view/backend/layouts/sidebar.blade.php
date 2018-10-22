<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            {{-- <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li> --}}
            <li>
                <a class="@if(Request::is('/')) active @endif" href="{{ route('internal::dashboard') }}">
                    <i class="fa fa-dashboard fa-fw"></i> Dashboard
                </a>
            </li>
            <li>
                <a class="@if(Request::is('profile*')) active @endif" href="{{ route('internal::profile.index') }}">
                    <i class="fa  fa-user fa-fw"></i> Profile
                </a>
            </li>
            <li class="@if(Request::is('role*')) active @esle  @endif">
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Role<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="@if(Request::is(route('internal::role.create'))) active @endif">
                        <a href="{{ route('internal::role.create') }}"><i class="fa fa-pencil fa-fw"></i> Create</a>
                    </li>
                    <li class="@if(Request::is(route('internal::role.index'))) active @endif">
                        <a href="{{ route('internal::role.index') }}"><i class="fa fa-list-alt fa-fw"></i> List</a>
                    </li>
                </ul>
            </li>
            <li class="@if(Request::is('user*')) active @esle  @endif">
                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="@if(Request::is(route('internal::user.create'))) active @endif">
                        <a href="{{ route('internal::user.create') }}"><i class="fa fa-pencil fa-fw"></i> Create</a>
                    </li>
                    <li class="@if(Request::is(route('internal::user.index'))) active @endif">
                        <a href="{{ route('internal::user.index') }}"><i class="fa fa-list-alt fa-fw"></i> List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->