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
                            <li class="breadcrumb-item active" aria-current="page">割当</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="bank-inner-details">
                    <div class="row d-flex justify-content-center">
                        <form action="{{ route('admin.projects.assign') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="option-blog d-flex justify-content-center">
                                <div class="type-blog">
                                    <div class="form-group mb-4">
                                        <label class="control-label" for="subject">
                                            <h6>プロジェクト名<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <select name="project_id" id="" class="form-control">
                                                @foreach ($data['projects'] as $item)
                                                    <option name="project_id" value="{{ $item->id }}" {{ $data['project']->id == $item->id ? 'selected' : ''}}>{{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <label class="control-label" for="subject">
                                            <h6>クリエイター<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <select name="creator_id" id="" class="form-control">
                                                @foreach ($data['creators'] as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="control-label" for="subject">
                                            <h6>始まる時間<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="date" class="form-control" id="name"
                                                 name="time_start">
                                        </div>
                                        <label class="control-label" for="subject">
                                            <h6>終了時間<span class="required">*</span></h6>
                                        </label>
                                        <div class="title">
                                            <input type="date" class="form-control" id="name"
                                                 name="time_end">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group ">
                                <div class="col-sm-offset-2 btn-submit">
                                    <button type="submit" class="btn btn-primary">割当</button>
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
