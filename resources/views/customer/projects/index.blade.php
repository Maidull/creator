@extends('customer.layouts.master')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
    <link rel="stylesheet" href="{{ asset('admin-assets\css\banner\banner.css') }}">
@endsection

@section('admin_style')
    @include('customer.includes.datatable.style')
@endsection

@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <h4 class="card-title">プロジェクト</h4>
                            </div>
                        </div>
                        <form class="form-inline mb-3" action="{{ route('customer.projects.search') }}" method="GET">
                            <select class="form-control" name="month">
                                <option value="">月</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ request()->get('month') == $i ? 'selected' : '' }}>月 {{ $i }}</option>
                                @endfor
                            </select>
                            <select class="form-control mr-3 ml-3" name="year">
                                <option value="">年</option>
                                @for ($i = date('Y') - 5; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}"  {{ request()->get('year') == $i ? 'selected' : '' }}>年 {{ $i }}</option>
                                @endfor
                            </select>
                            <button type="submit" class="btn btn-primary">検索</button>
                        </form>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">プロジェクト名</th>
                                    <th class="text-center align-middle">説明</th>
                                    <th class="text-center align-middle">総労働時間</th>
                                    <th class="text-center align-middle">プロジェクトの開始時間</th>
                                    <th class="text-center align-middle"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data['projects'] as $result)
                                    <tr>
                                        <td class="text-center">
                                            {{ $result['name'] }}
                                        </td>
                                        <td class="text-center">
                                            {{ $result['description'] }}
                                        </td>
                                        <td class="text-center">
                                            {{ \App\Models\Assignment::where('project_id', $result['id'])->sum('total_time') }}
                                        </td>
                                        <td class="text-center">
                                            {{ date('m/Y', strtotime($result['created_at'])) }}
                                        </td>
                                        <td class="align-middle d-flex justify-content-center">
                                            <a href="{{ route('customer.projects.show', ['id' => $result['id']]) }}" class="btn btn-sm btn-primary" style="width:100px;">
                                            詳細
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
    @include('customer.includes.datatable.script')
@endsection
