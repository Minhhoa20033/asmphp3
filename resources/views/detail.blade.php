@extends('layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')




                    
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="menu-thumb">
                        <div class="menu-image-wrap">
                            <img src="{{ $aos->image }}" class="img-fluid menu-image"
                                alt="">

                            <span class="menu-tag bg-warning">50%</span>
                        </div>

                        <div class="menu-info d-flex flex-wrap align-items-center">
                            <h4 class="mb-0">{{ $aos->title }}</h4>

                            <span class="price-tag bg-white shadow-lg ms-4">{{ $aos->price }}</span>

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
                            <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                <p>{{ $aos->quantity }}</p>
                            </div>
                            <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                <p>{{ $aos->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

               @endsection