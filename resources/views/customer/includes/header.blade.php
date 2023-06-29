<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('customer.projects') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('admin-assets/images/logo4.png') }}" alt="" height="16">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('admin-assets/images/logo4.png') }}" alt="" height="48">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{ asset('admin-assets/images/users/avatar-1.png') }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ Auth::guard('user')->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item text-danger" href="{{ route('customer.logout') }}"><i
                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> {{ __('admin.button.logout') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
