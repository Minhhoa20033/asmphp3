@extends('admin.layouts.master')
@section('title')
    Cập nhật người dùng
@endsection
@section('content')
    <div class="container-fluid" style="position: relative">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cập nhật người dùng: {{ $user->name }}</h1>
        @if (session()->has('success') && session()->get('success'))
            <span style="position: absolute; right: 40px; top: 10px;" class="text-danger">Thao tác thành công</span>
        @endif
        @if (session()->has('success') && session()->get('success') != true)
            <span style="position: absolute; right: 40px; top: 10px;"
                class="text-danger">{{ session()->get('success') }}</span>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{-- @dd(session()->get('success')) --}}
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        <label for="name" class="col-4 col-form-label text-capitalize">Name</label>
                        <div class="col-8">
                            <input class="form-control" id="id" name="name" value="{{ $user->name }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-4 col-form-label text-capitalize">email</label>
                        <div class="col-8">
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $user->email }}" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-4 col-form-label text-capitalize">role</label>
                        <div class="col-8">
                            @if ($user->role == 'customer')
                                <span class="badge btn btn-primary">Customer</span>
                            @else
                                <span class="badge btn btn-danger">Admin</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
