@extends('layout')

@section('title', 'Danh sách sản phẩm')

@section('content')


                
<div class="col-lg-4 col-md-6 col-12">
    <div class="menu-thumb">
        @foreach ($aos as $ao)
        <div class="menu-image-wrap">
            
                
            
            <a href="{{ route('detail', $ao->id) }}"><img src="images/breakfast/Screenshot 2024-03-19 144114.png" class="img-fluid menu-image"
                alt=""></a>
            <span class="menu-tag bg-warning">50%</span>
        </div>
@endforeach
        <div class="menu-info d-flex flex-wrap align-items-center">
            <h4 class="mb-0">{{ $ao->title }}</h4>
            <a href="{{ route('detail', $ao->id) }}"><img src="" class="img-fluid menu-image"
                alt=""></a>
            <span class="price-tag bg-white shadow-lg ms-4">{{ $ao->price }}</span>

            <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                <h6 class="reviews-text mb-0 me-3">4.3/5</h6>

                <div class="reviews-stars">
                    <i class="bi-star-fill reviews-icon"></i>
                    <i class="bi-star-fill reviews-icon"></i>
                    <i class="bi-star-fill reviews-icon"></i>
                    <i class="bi-star-fill reviews-icon"></i>
                    <i class="bi-star reviews-icon"></i>
                </div>


            </div>
        </div>
    </div>
</div>


@endsection
