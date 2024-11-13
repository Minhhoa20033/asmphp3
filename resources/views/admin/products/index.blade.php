@extends('admin.layouts.master')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4" style="position: relative">
            @if (session()->has('success') && session()->get('success'))
                <p style="position: absolute; right: 20px; top: 20px;" class="text-danger">Thao tác thành công</p>
            @endif
            @if (session()->has('success') && session()->get('success') != true)
                <p style="position: absolute; right: 20px; top: 20px;" class="text-danger">{{ session()->get('success') }}</p>
            @endif
            <div class="card-header py-3">
                <a class="m-0 font-weight-bold badge p-2 btn btn-primary" href="{{ route('products.create') }}">Thêm mới</a>
            </div>
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
                                <th>Action</th>
                            </tr>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td class="col-2">
                                        <img src="{{ asset('storage'.'/'.$product->image) }}" class="img-fluid rounded-top" alt="" />
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price) }} VND</td>
                                    <td>{{ number_format($product->quantity) }}</td>
                                    <td>{{ number_format($product->views) }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}"
                                            class="badge bg-info p-2 text-white">Show</a>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="badge bg-warning p-2">Update</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="border-0  badge bg-danger p-2 text-white"
                                                onclick="return confirm('Xác nhận xóa')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('admin/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
