@php
    use App\Models\Project;
@endphp
@extends('creator.layouts.master')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
    <link rel="stylesheet" href="{{ asset('admin-assets\css\banner\banner.css') }}">
@endsection

@section('admin_style')
    @include('creator.includes.datatable.style')
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
                            <li class="breadcrumb-item active" aria-current="page">プロジェクト一覧</li>
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
                                <h4 class="card-title">プロジェクト一覧</h4>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">プロジェクト名</th>
                                    <th class="text-center align-middle">仕事を始める時間</th>
                                    <th class="text-center align-middle">終了時間</th>
                                    <th class="text-center align-middle">総労働時間</th>
                                    <th class="text-center align-middle"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['assignments'] as $result)
                                    <tr>
                                        <td class="align-middle">
                                            <a
                                                href="{{ Project::query()->where('id', $result['project_id'])->first()->name }}">
                                                {{ Project::query()->where('id', $result['project_id'])->first()->name }}
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ $result['time_start'] }}">
                                                {{ $result['time_start'] }}
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ $result['time_end'] }}">
                                                {{ $result['time_end'] }}
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ $result['total_time'] }}">
                                                {{ $result['total_time'] }}
                                            </a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="{{ route('creator.assignments.show', ['assignment' => $result['id'] ]) }}" class="btn btn-primary mr-3"
                                                style="margin-right: 10px;"><i class="bx bx-pencil"> 詳細</i></a>
                                            <a href="{{ route('creator.assignments.settime', ['assignment' => $result['id'] ]) }}" class="btn btn-success mr-3"
                                                style="margin-right: 10px;"><i class="bx bx-pencil"> 割当</i></a>
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
    @include('creator.includes.datatable.script')
@endsection
