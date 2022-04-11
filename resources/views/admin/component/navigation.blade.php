<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            
            <div class="">
                <div class="main-menu-header">
                    @if (auth()->user()->image_path)
                    <img class="img-radius" src="{{ auth()->user()->image_path }}" alt="User-Profile-Image">
                        
                    @else
                    <img class="img-radius" src="{{ asset('adminlte/dist/assets/images/user/avatar-2.jpg')}}" alt="User-Profile-Image">
                        
                    @endif
                    <div class="user-details">
                        <div id="more-details">{{ auth()->user()->name }}<i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        {{-- <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>Xem thông tin</a></li> --}}
                        <li class="list-group-item"><a href="{{ route('login.logout') }}"><i class="feather icon-log-out m-r-5"></i>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Điều hướng</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Trang chủ</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Quản lý</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Thể loại</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Sản phẩm</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Người dùng</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Vai trò</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permission.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Quyền</span></a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>