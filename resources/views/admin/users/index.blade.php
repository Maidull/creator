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
                            <li class="breadcrumb-item active" aria-current="page">クライアント</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <h4 class="card-title">クライアント</h4>
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.users.create') }}">
                                <i class="mdi mdi-plus me-2"></i> {{ __('admin.action.create') }}
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">名前</th>
                                    <th class="text-center align-middle">メール</th>
                                    <th class="text-center align-middle"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['users'] as $result)
                                    <tr>
                                        <td class="align-middle">
                                            <a href="{{ $result['name'] }}">
                                                {{ $result['name'] }}
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ $result['email'] }}">
                                                {{ $result['email'] }}
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('admin.users.edit', ['user' => $result['id']]) }}"
                                                class="btn btn-primary mr-3" style="margin-right: 10px;"><i
                                                    class="bx bx-pencil"> 編集</i></a>
                                            <a href="{{ route('admin.users.delete', ['id' => $result['id']]) }}"
                                                class="btn btn-danger" onclick="return confirm('このクライアントを削除しますか?')">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
@endsection

@section('admin_script')
    @include('admin.includes.datatable.script')
@endsection
