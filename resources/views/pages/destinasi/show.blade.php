@extends('app')

@section('title') {{ $data->name }} - Visit Baubau @endsection

@section('content')
<div class="tour_page right-sidebar">
    <div class="tour_page_head" style="background-image: url({{ asset(\YukTripAPI::getImageByType($data->images, 'banner')) }})">
        <div class="breadcrumbs" style="margin-top: 28px;">
            <div class="wrap">
                <div class="wrap_float" style="width: fit-content;background-color: #00000085;border-radius: 3px;padding-top: 3px;padding-bottom: 3px;padding-right: 6px;padding-left: 6px;color: white;">
                    <a href="#">Utama</a>
                    <span class="separator">/</span>
                    <a href="#">{{ $title }}</a>
                    <span class="separator">/</span>
                    <a href="#">{{ $data->name }}</a>
                </div>
            </div>
        </div>
        <div class="header_content" id="head">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="top-info">
                        <h1 class="tour_title">
                            {{ $data->name }}
                        </h1>
                        <div class="controls">
                            <div class="arrows" id="tour-head-slider-arrows">
                                <div class="arrow prev"></div>
                                <div class="arrow next"></div>
                            </div>
                        </div>
                    </div>
                    <div class="slider_wrap">
                        <div class="slider lightgallery" id="tour-head-slider">
                            @foreach($data->images as $image)
                            <a href="{{ asset('storage/'.$image->image_filename) }}" class="slide">
                                <img src="{{ asset('storage/'.$image->image_filename) }}" alt="">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tour_page_body">
        <div class="wrap">
            <div class="wrap_float">
                <div class="left_content">
                    <div class="overview js-section content-block" id="overview">
                        <h2 class="title">Deskripsi</h2>
                        <p class="description">
                            {{ $data->description }}
                        </p>
                    </div>
                    <div class="included js-section content-block" id="included">
                        <h2 class="title">Fasilitas</h2>
                        <ul>
                            @foreach($data->facilities as $facility)
                                <li>
                                    <span class="li_title">{{ $facility->name }}</span>
                                    <span class="li_subtitle">{{ $facility->category->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--
                    <div class="pricing js-section content-block" id="pricing_vehicle">
                        <h2 class="title">Tiket Masuk - Kendaraan</h2>
                        <ul>
                            <?php 
                            $vehiclePricing = [];
                            foreach($data->pricings as $pricing) {
                                if($pricing->category == 'vehicle') {
                                    $pricing->category_type = str_replace(['all', 'adult', 'child', 'car', 'motorbike', 'bus'], ['Semua', 'Dewasa', 'Anak-Anak', 'Mobil', 'Motor', 'Bus'], $pricing->category_type);
                                    $pricing->type = str_replace(['Weekday', 'Weekend', 'Date'], ['Hari Kerja', 'Hari Libur', ''], $pricing->type);
                                    $vehiclePricing[] = $pricing;
                                }
                            }
                            ?>
                            @empty($vehiclePricing)
                                Tidak ada data
                            @endempty
                            @foreach($vehiclePricing as $pricing)
                                <li>
                                    <span class="li_title">{{ $pricing->category_type }} - {{ $pricing->type }}</span>
                                    <span class="li_subtitle">@rupiah($pricing->price)</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="pricing js-section content-block" id="pricing_person">
                        <h2 class="title">Tiket Masuk - Perorang</h2>
                        <ul>
                            <?php 
                            $personPricing = [];
                            foreach($data->pricings as $pricing) {
                                if($pricing->category == 'person') {
                                    $pricing->category_type = str_replace(['all', 'adult', 'child', 'car', 'motorbike', 'bus'], ['Semua', 'Dewasa', 'Anak-Anak', 'Mobil', 'Motor', 'Bus'], $pricing->category_type);
                                    $pricing->type = str_replace(['Weekday', 'Weekend', 'Date'], ['Hari Kerja', 'Hari Libur', ''], $pricing->type);
                                    $personPricing[] = $pricing;
                                }
                            }
                            ?>
                            @empty($personPricing)
                                Tidak ada data
                            @endempty
                            @foreach($personPricing as $pricing)
                                <li>
                                    <span class="li_title">{{ $pricing->category_type }} - {{ $pricing->type }}</span>
                                    <span class="li_subtitle">@rupiah($pricing->price)</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                        -->
                    @isset($data->map_coordinate)
                    <div class="location js-section content-block" id="location">
                        <h3 class="title">Lokasi</h3>
                        <div class="map">
                            <iframe src="https://maps.google.com/maps?width=700&height=440&hl=en&q={{ $data->map_coordinate }}&ie=UTF8&t=&z=18&iwloc=B&output=embed"></iframe>
                        </div>
                    </div>
                    @endisset
                </div>
                <div class="right_content sidebar">
                    <div class="navigation" id="sidebar-navigation">
                        <ul>
                            <li><a class="active" href="#head">Foto / Video</a></li>
                            <li><a href="#overview">Deskripsi</a></li>
                            <li><a href="#included">Fasilitas</a></li>
                            <li><a href="#pricing_vehicle">Tiket Masuk</a></li>
                            @isset($data->map_coordinate)
                            <li><a href="#location">Lokasi</a></li>
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('social.instagram-post')
@endsection

@section('content_scripts')
<script type="text/javascript">
</script>
@endsection