@extends('creator.layouts.master')
@section('admin_head')
<title>{{ $data['title'] }}</title>
<meta content="{{ $data['title'] }}" name="description" />
@endsection

@section('admin_content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><span><i class="bx bxs-home-circle"></i> {{ __('admin.sidebar.dashboard') }}</span></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.sidebar.profile') }}</li>
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
                    <img class="rounded-circle avatar-x1 mb-3 " style="margin-left: 500px;" src="{{ asset('upload/profile_img') . '/' . Auth::guard('creator')->user()->profile_image }}" width="150">
                    <h4 class="card-title">名前: {{ $creatorData->name }}</h4>
                    <hr>
                    <h4 class="card-title">メール: {{ $creatorData->email }}</h4>
                    <hr>
                    <a href="{{ route('creator.edit.profile') }}" class="btn-grad">保存</a>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection