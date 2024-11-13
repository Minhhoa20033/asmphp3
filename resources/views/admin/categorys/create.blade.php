@extends('admin.layouts.master')
@section('title')
    Thêm mới danh mục
@endsection
@section('content')
    <div class="container-fluid" style="position: relative">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm mới danh mục</h1>
        @if (session()->has('success') && session()->get('success') != true)
            <p style="position: absolute; right: 40px; top: 10px;" class="text-danger">{{ session()->get('success') }}
            </p>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4" style="position: relative">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <label for="id" class="col-4 col-form-label text-capitalize">id</label>
                        <div class="col-8">
                            <input class="form-control" id="id" id="id" placeholder="ID tự động" disabled />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-4 col-form-label text-capitalize">name</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                            <a href="{{ route('categories.index') }}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
