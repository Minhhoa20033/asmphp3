@extends('admin.layouts.master')
@section('title')
    Sản phẩm thuộc loại
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sản phẩm thuộc loại: {{$category->name}}</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-capitalize">stt</th>
                                <th class="text-capitalize">image</th>
                                <th class="text-capitalize">name</th>
                                <th class="text-capitalize">category_name</th>
                                <th class="text-capitalize">price</th>
                                <th class="text-capitalize">quantity</th>
                                <th class="text-capitalize">views</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <tr>
                                <th class="text-capitalize">stt</th>
                                <th class="text-capitalize">image</th>
                                <th class="text-capitalize">name</th>
                                <th class="text-capitalize">category_name</th>
                                <th class="text-capitalize">price</th>
                                <th class="text-capitalize">quantity</th>
                                <th class="text-capitalize">views</th>
                            </tr>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td class="col-2">
                                        <img src="{{ Storage::url($product->image) }}" class="img-fluid rounded-top" alt="" />
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ number_format($product->price) }} VND</td>
                                    <td>{{ number_format($product->quantity) }}</td>
                                    <td>{{ number_format($product->views) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('categories.index')}}" class="btn btn-danger">Quay lại</a>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('admin/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
