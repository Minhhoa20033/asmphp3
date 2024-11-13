<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>User- @yield('title')</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link href="/public/css/bootstrap-icons.css" rel="stylesheet">

    <link href={{asset('css/tooplate-crispy-kitchen.css')}} rel="stylesheet">


</head>

<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <a class="navbar-brand" href="index.html">
                    <img src="{{asset('images\Screenshot_2024-09-26_205030-removebg-preview.png')}}" alt="" width="300px" height="140px">
                </a>

            <div class="d-lg-none">
                <button type="button" class="custom-btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#BookingModal">Reservation</button>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Home</a>
                    </li>

                    @foreach ($categories as $cate)
                        <li class="nav-item">
                        <a class="nav-link" href="/category/{{ $cate->id }}">{{ $cate->name }}</a>
                    </li>
                    @endforeach
                    
                </ul>
            </div>

            <div class="d-none d-lg-block">
                <button type="button" class="custom-btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#BookingModal"><a href="{{ route('login') }}">Đăng nhập</a></button>
            </div>

        </div>
    <!--Thông tin user-->
    @if (Auth::check())
    <div>
        <b><a href="{{route('admin')}}">{{ Auth::user()->email }}</a></b>
        <a href="{{ route('logout') }}">Logout</a>
    </div>
    @endif

    </nav>

    <main>

        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-12 m-auto">
                        <div class="heroText">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-12">
                    <div id="carouselExampleCaptions" class="carousel carousel-fade hero-carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        </div>
                    </div>
                </div>
            </div>

            <div class="overlay">
                <img src="{{asset('images/Screenshot 2024-10-14 071612.png')}}" alt="">
            </div>

        </section>



    </main>
    
    @yield('content')
    <footer class="site-footer section-padding">

        <div class="container">

            <div class="row">

                <div class="col-12">
                    <h4 class="text-white mb-4 me-5">Apple Store</h4>
                </div>

                <div class="col-lg-4 col-md-7 col-xs-12 tooplate-mt30">
                    <h6 class="text-white mb-lg-4 mb-3">Địa Chỉ</h6>

                    <p> Thach Hoa, Thach That, Ha Noi</p>
                    <p> Phuc Tan, Hoan Kiem, Ha Noi</p>


                </div>

                <div class="col-lg-4 col-md-5 col-xs-12 tooplate-mt30">
                    <h6 class="text-white mb-lg-4 mb-3">Giờ mở cửa</h6>

                    <p class="mb-2">Thứ 2 - Chủ Nhật</p>

                    <p>7:00 AM - 22:00 PM</p>

                    <p>Tel: <a href="tel: 010-02-0340" class="tel-link">0-923-482-135</a></p>
                </div>

                <div class="col-lg-4 col-md-6 col-xs-12 tooplate-mt30">
                    <h6 class="text-white mb-lg-4 mb-3">Social</h6>

                    <ul class="social-icon">
                        <li>
                            <a href="#" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li>
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li>
                            <a href="https://twitter.com/search?q=tooplate.com&src=typed_query&f=live" target="_blank" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li>
                            <a href="#" class="social-icon-link bi-youtube"></a>
                        </li>
                    </ul>


                </div>

            </div>
            <!-- row ending -->

        </div>
        <!-- container ending -->

    </footer>
      <!-- JAVASCRIPT FILES -->
      <script src="/public/js/jquery.min.js"></script>
      <script src="/public/js/bootstrap.bundle.min.js"></script>
      <script src="/public/js/custom.js"></script>
  
  </body>
  
  </html>