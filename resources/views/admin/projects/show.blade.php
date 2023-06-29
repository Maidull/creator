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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <h4 class="card-title">プロジェクトの詳細</h4>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">プロジェクト名</th>
                                    <th class="text-center align-middle">就業日</th>
                                    <th class="text-center align-middle">総作業時間</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($assignmentDetails as $key => $assignmentDetail)
                                    @foreach ($assignmentDetail as $key1 => $item)
                                        <tr>
                                            <td class="text-center">{{ \App\Models\Project::find($key)->name }}</td>
                                            <td class="text-center">{{ $key1 }}</td>
                                            <td class="text-center">{{ $item['total_time'] }}</td>
                                        </tr>
                                    @endforeach
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
