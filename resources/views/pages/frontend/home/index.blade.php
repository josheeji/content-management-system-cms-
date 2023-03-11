{{-- @php
    $banner = App\Models\Banner::where('title', 'Home')->first();
    $bannerItems = App\Models\BannerItem::where('banner_id', '=', $banner->id)->get();
    
@endphp

@extends('layouts.frontend.app')

@section('title', 'Home Page')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                @foreach ($bannerItems as $bannerItem)
                    <div class="carousel-item active"
                        style="background-image: url('/backend_assets/images/banners/{{ $bannerItem->image }}')">
                        <div class="carousel-container">
                            <div class="container">

                                <h2 class="animate__animated animate__fadeInDown">{{ $bannerItem->heading }}</h2>

                                <p class="animate__animated animate__fadeInUp">{{ $bannerItem->short_description }}</p>


                                <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
    </section>
    <!-- End Hero -->
    <!-- About Section -->
    

    <section id="about" class="about">
        <div class="container">

            <div class="row content">
                <div class="col-lg-6">
                    <h2>{{$bannerItem->heading}}</h2>
                    <h3>{{$bannerItem->sub_heading}}</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                        <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit
                        </li>
                        <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in</li>
                    </ul>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore
                        magna aliqua.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->
@endsection --}}
