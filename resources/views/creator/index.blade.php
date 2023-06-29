@php
use \App\Models\Creator;
@endphp
@extends('creator.layouts.master')
@section('admin_head')
<title>{{ $data['title'] ?? '' }}</title>
<meta content="{{ $data['title'] ?? '' }}" name="description" />
@endsection

@section('admin_content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active" aria-current="page">ホームページ</li>
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
                            <h4 class="card-title">{{ __('admin.sidebar.dashboard') }}</h4>
                        </div>
                    </div>
                    <div class="container">
                        <div class="ring"></div>
                        <div class="ring"></div>
                        <div class="ring"></div>
                        <p>Comming Soon...</p>

                        <!-- end row -->

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end page title -->

    </div>


    <!-- end modal -->
    @endsection