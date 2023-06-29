@extends('admin.layouts.master')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
    <link rel="stylesheet" href="{{ asset('admin-assets\css\banner\banner.css') }}">
@endsection

@section('admin_style')
    @include('admin.includes.datatable.style')
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
                            <li class="breadcrumb-item active" aria-current="page">クリエイター</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="bank-inner-details">
                    <div class="row d-flex justify-content-center">
                        <form action="{{ route('admin.users.update', $data['user']->id) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="option-blog">
                                <div class="type-blog">
                                    <div class="form-group mb-4">
                                        <label class="control-label" for="subject">
                                            <h6>クリエイターの名前<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Tên" name="name" value="{{ old('name', $data['user']->name) }}">
                                        </div>
                                        @if ($errors->has('name'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        <label class="control-label" for="subject">
                                            <h6>メール<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="email"
                                                placeholder="Email" name="email" value="{{ old('email', $data['user']->email) }}">
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                        <label class="control-label" for="subject">
                                            <h6>パスワード<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="text" class="form-control" id="password"
                                                placeholder="Mật khẩu" name="password" value="{{ $data['user']->password }}">
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class='text-danger mt-2'>
                                                * {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="form-group ">
                                <div class="col-sm-offset-2 btn-submit">
                                    <button type="submit" class="btn btn-primary">保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @include('admin.includes.upload')
@endsection

@section('admin_script')
    @include('admin.includes.datatable.script')
@endsection
