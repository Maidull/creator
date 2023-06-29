@php use App\Helpers\AdminHelper; @endphp
@extends('admin.layouts.index')
@section('admin_main')
    <body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.includes.header')

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Side menu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        @foreach(AdminHelper::getAdminSidebar() as $menu)
                            <li>
                                
                                <a href="{{ (!isset($menu['items']) && !empty($menu['route'])) ? route("admin.{$menu['route']}") : 'javascript:void(0);' }}">
                                    <i class="{{$menu['icon']}}"></i>
                                    <span>{{ $menu['label'] }}</span>
                                </a>
                                @if(isset($menu['items']))
                                    <ul class="sub-menu" aria-expanded="false">
                                        @foreach($menu['items'] as $subMenu)
                                            <li>
                                                <a href="{{ !empty($subMenu['route']) ? route("admin.{$subMenu['route']}") : 'javascript:void(0);' }}">{{ $subMenu['label'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('admin_content')
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Transaction Modal -->
            <div class="modal fade deleteModal " tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-confirm modal-dialog-top" role="document">

                    <div class="modal-content">
                        <form id="deleteForm" action="" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header" style="border: none;">

                            </div>
                            <div class="modal-body">
                                <h5 class="text-center" id="deleteMessage"></h5>
                            </div>
                            <div class="modal-footer d-flex align-items-center justify-content-center"
                                style="border: none">
                                <button type="button" class="btn btn-warning me-2" data-bs-dismiss="modal">{{ __('admin.action.cancel') }}
                                </button>
                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> {{ __('admin.action.delete') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal -->
            <footer class="footer">
                <div class="ocean">
                    <div class="wave" id="wave1"></div>
                    <div class="wave" id="wave2"></div>
                    <div class="wave" id="wave3"></div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('admin.includes.script')
    </body>
@endsection
