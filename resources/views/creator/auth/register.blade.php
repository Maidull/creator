@extends('creator.layouts.auth')
@section('admin_head')
    <title>{{ $data['title'] }}</title>
    <meta content="{{ $data['title'] }}" name="description" />
@endsection
@section('admin_auth_top')
    <div class="row">
        <div class="col-6 align-self-end">
            <img src="admin-assets\images\profile-img.png" alt="" class="img-fluid">
        </div>
    </div>
@endsection
@section('admin_auth_main')
    <div class="p-2">
        <form class="form-horizontal" action="{{ route('creator.register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">クリエイター名</label>
                <input type="text" class="form-control" id="email" name="name" value="{{ old('name') }}" placeholder="クリエイター名">
                @error('name')
                    <p class="text-danger mt-2">{{ $errors->first('name') }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">{{ __('admin.label.email') }}</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('admin.placeholder.email') }}">
                @error('email')
                    <p class="text-danger mt-2">{{ $errors->first('email') }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('admin.label.password') }}</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('admin.placeholder.password') }}">
                @error('password')
                    <p class="text-danger mt-2">{{ $errors->first('password') }}</p>
                @enderror
            </div>

            <div class="mt-3">
                <button class="btn-grad" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection
