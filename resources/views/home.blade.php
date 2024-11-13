@extends('layout')

@section('title', 'Home')

@section('content')

    <section class="menu section-padding">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h2 class="text-center mb-lg-5 mb-4">Sản Phẩm Bán Chạy</h2>
                </div>

                @foreach ($ao as $ao)
                
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="menu-thumb">
                        <div class="menu-image-wrap">
                            
                            <a href="{{ route('detail', $ao->id) }}"><img src="{{ asset('storage').'/'.$ao->image }}" class="img-fluid menu-image"
                                alt=""></a>
                            <span class="menu-tag bg-warning">50%</span>
                        </div>

                        <div class="menu-info d-flex flex-wrap align-items-center">
                            <h4 class="mb-0">{{ $ao->title }}</h4>

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

                @endforeach


            </div>
        </div>
    </section>
@endsection
