@extends('creator.layouts.master')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endsection

@section('admin_content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><span><i
                                            class="bx bxs-home-circle"></i> {{ __('admin.sidebar.dashboard') }}</span></a>
                            </li>
                            <li class="breadcrumb-item active"
                                aria-current="page">{{ __('admin.sidebar.profile') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <h4 class="card-title">{{ __('admin.sidebar.profile') }}</h4>
                            </div>
                        </div>
                        
                        <form method="post" action="{{ route('creator.store.profile') }}" enctype="multipart/form-data">
                        
                            @csrf
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded-circle avatar-x1" width="150" style="margin-left: 320px;" src="{{ asset('upload/profile_img') . '/' .  Auth::guard('creator')->user()->profile_image }}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">プロフィール画像</label>
                            <div class="col-sm-10">
                                <input name="profile_image" class="form-control" type="file" id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">クリエイター名</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" value="{{ $editData->name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">メール</label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="text" value="{{ $editData->email }}">
                            </div>
                        </div>
                        <input type="submit" class="btn-grad" value="編集">
                        </form>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>

    <script type="text/javascript">
        
        $(document).ready(function() {
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
