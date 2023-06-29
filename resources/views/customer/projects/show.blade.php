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
                                <h4 class="card-title">プロジェクトの詳細</h4>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">アバター</th>
                                    <th class="text-center align-middle">クリエイター</th>
                                    <th class="text-center align-middle">メール</th>
                                    <th class="text-center align-middle">総労働時間</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($assignments as $assignment)
                                    <tr>
                                        <td class="text-center"><img src="{{ asset('upload/profile_img/' . \App\Models\Creator::find($assignment['creator_id'])->profile_image) }}" width="100" /></td>
                                        <td class="text-center">{{ \App\Models\Creator::find($assignment['creator_id'])->name }}</td>
                                        <td class="text-center">{{ \App\Models\Creator::find($assignment['creator_id'])->email }}</td>
                                        <td class="text-center">{{ $assignment['total_time'] }}</td>
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
