{{-- @php
    $banner = App\Models\Banner::where('title', 'Home')->first();

    $bannerItems = App\Models\BannerItem::where('banner_id', '=', $banner->id)->get();
    
@endphp --}}

@extends('layouts.frontend.app')

@section('title', $menu->title)

@section('content')
    <!-- ======= Hero Section ======= -->
    @if (!!$bannerItems)
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


                                    <a href="#"
                                        class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
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
    @endif
    <!-- End Hero -->

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $menu->post?->title }}</h2>

            </div>

        </div>
    </section>
    {{-- {{ $menu->post->description }} --}}
    {!! $menu->post?->description !!}


@endsection
