@extends('admin.layouts.master')
@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Chi tiết sản phẩm: {{ $category->name }}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row g-0">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text-danger">Id: {{ $category->id }}</h5>
                        <h5 class="card-title font-weight-bold text-danger">Name: {{ $category->name }}</h5>
                        <p class="card-text">
                            <span class="font-weight-bold text-capitalize">created_at:</span>
                            {{ date('d/m/Y', strtotime($category->created_at)) }}
                        </p>
                        <p class="card-text">
                            <span class="font-weight-bold text-capitalize">updated_at:</span>
                            {{ date('d/m/y', strtotime($category->updated_at)) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('categories.index') }}" class="badge btn btn-danger p-3">Quay lại</a>
    </div>
@endsection
