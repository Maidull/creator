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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <h4 class="card-title">クリエイター</h4>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">アバター</th>
                                    <th class="text-center align-middle">名前</th>
                                    <th class="text-center align-middle">メール</th>
                                    <th class="text-center align-middle">総労働時間</th>
                                    <th class="text-center align-middle">総プロジェクト数</th>
                                    <th class="text-center align-middle"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['creators'] as $result)
                                    <tr>
                                        <td class="align-middle">
                                            <img src="{{ asset('upload/profile_img/' . \App\Models\Creator::find($result['id'])->profile_image) }}" width="100" />
                                        </td>
                                        <td class="align-middle">
                                            {{ $result['name'] }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $result['email'] }}
                                        </td>
                                        <td class="align-middle">
                                            {{ \App\Models\AssignmentDetail::where('creator_id', $result['id'])->sum('time_to_work') }}
                                        </td>
                                         <td class="align-middle">
                                            {{ \App\Models\AssignmentDetail::where('creator_id', $result['id'])->distinct('project_id')->count() }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('admin.projects.show', ['id' => $result['id']]) }}"
                                                class="btn btn-primary btn-sm mr-3" style="margin-right: 10px;">詳細</a>
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
