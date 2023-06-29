@extends('customer.layouts.index')
@section('admin_main')
    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                @yield('admin_auth_top')
                            </div>
                            <div class="card-body pt-0">
                                
                                @yield('admin_auth_main')

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @include('customer.includes.script')
    </body>
@endsection

