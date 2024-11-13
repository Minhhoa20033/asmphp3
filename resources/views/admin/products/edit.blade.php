@extends('admin.layouts.master')
@section('title')
    Cập nhật sản phẩm
@endsection
@section('content')
    <div class="container-fluid" style="position: relative">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cập nhật sản phẩm: {{ $ao->title }}</h1>
        @if (session()->has('success') && session()->get('success'))
            <p style="position: absolute; right: 40px; top: 10px;" class="text-danger">Thao tác thành công</p>
        @endif
        @if (session()->has('success') && session()->get('success') != true)
            <p style="position: absolute; right: 40px; top: 10px;" class="text-danger">{{ session()->get('success') }}</p>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('aos.update', $ao) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        <label for="title" class="col-4 col-form-label text-capitalize">Title</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ $ao->title }}" />
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="category_id" class="col-4 col-form-label text-capitalize">category</label>
                        <div class="col-8">
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $cate)
                                    <option value="{{ $cate->id }}" @selected($cate->id == $ao->category_id)>{{ $cate->name }}
                                    </option>
                                @endforeach
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-4 col-form-label text-capitalize">price</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="price" id="price"
                                value="{{ $ao->price }}" />
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="quantity" class="col-4 col-form-label text-capitalize">quantity</label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="quantity" id="quantity"
                                value="{{ $ao->quantity }}" />
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-4 col-form-label text-capitalize">description</label>
                        <div class="col-8">
                            <textarea name="description" class="form-control" rows="10">{{ $ao->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="col-4 col-form-label text-capitalize">image</label>
                        <div class="col-8">
                            <input type="file" class="form-control mb-2" name="image" id="image" />
                            <img src="{{ Storage::url($ao->image) }}" class="img-fluid rounded-top" alt="" />
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-4 col-sm-8">
                            
                            <button type="submit" class="btn btn-primary">
                               Submit
                            </button>
                            <a href="{{ route('aos.index') }}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
