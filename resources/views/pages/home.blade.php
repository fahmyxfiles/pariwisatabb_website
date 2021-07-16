@extends('app')

@section('title') Visit Baubau - Portal Informasi Pariwisata Baubau @endsection

@section('content')
<div class="main_slider js_height">
    <div class="slider_wrap" id="main_slider_wrap">
        <div class="slide">
            <div class="bg-img" id="backgroundImage" style="background-image: url({{ asset('img/bg-home.jpg') }})"></div>
            <video id="myVideo" class="bg-img" style="display:none;">
                <source src="{{ asset('storage/video.mp4') }}" type="video/mp4">
            </video>
            <div class="wrap">
                <div class="wrap_float js_height">
                    <div class="slide_content" style="margin-bottom: 180px;">
                        <div class="title_wrap first_slide">
                            <h2 class="slide_title" style="line-height: 45px;">Selamat Datang<br>Website Pariwisata Kota Baubau</h2>
                        </div>
                        <p class="text first_slide" style="background-color: #00000044;padding: 25px;border-radius: 0.357rem !important;">
                        Visit Baubau merupakan portal informasi satu pintu mengenai informasi akomodasi, wisata, budaya, kuliner yang ada di Kota Baubau, Sulawesi Tenggara.
                        </p>
                        <div class="buttons first_slide">
                                <a href="#" class="btn button" onclick="playVideo()">Putar Video</a>
                            </div>
                        <div class="next_title first_slide">{{ $touristAttraction[0]->name }}</div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($touristAttraction as $ta)
            <div class="slide">
                <div class="bg-img" style="background-image: url({{ asset(\YukTripAPI::getImageByType($ta->images, 'main'))}})"></div>
                <div class="wrap">
                    <div class="wrap_float js_height">
                        <div class="slide_content">
                            <div class="title_wrap">
                                <h2 class="slide_title">{{ $ta->name }}</h2>
                            </div>
                            <p class="text" style="background-color: #00000044;padding: 25px;border-radius: 0.357rem !important;">
                                {{ $ta->description }}
                            </p>
                            <div class="buttons">
                                <a href="{{ route('touristAttraction.show', ['category' => (new \YukTripAPI())->getTouristAttractionCategoryById($ta->category_id)->slug, 'touristAttraction' => $ta->slug]) }}" class="btn button">Selengkapnya</a>
                                <!-- <a href="travel-list-full-width.html" class="link"><span>Choose tour</span></a> -->
                            </div>
                            @isset($touristAttraction[$loop->index+1])
                                <div class="next_title">{{ $touristAttraction[$loop->index+1]->name }}</div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="arrows">
        <div class="arrow prev" onclick="pauseVideo()"></div>
        <div class="arrow next" onclick="pauseVideo()"></div>
    </div>
</div>
<!--
<div class="search-tour">
    <div class="wrap">
        <div class="wrap_float">
            <div class="title_wrap">
                <h2 class="title">Cari Hotel & Penginapan</h2>
                <p class="subtitle">
                    Temukan tempat untuk menginap yang sesuai dengan keuangan kamu
                </p>
            </div>
            <div class="search-form" style="margin-top: 50px;">
                <div class="date-col">
                    <div class="label">Check In</div>
                    <div class="date_div">
                        <input type="text" class="js_calendar desctop-input">
                        <input type="date" class="mobile-input">
                        <div class="day"><?=date("d")?></div>
                        <div class="date_div_right">
                            <div class="month"><?=date("M")?></div>
                            <div class="year"><?=date("Y")?></div>
                        </div>
                    </div>
                </div>
                <div class="date-col">
                    <div class="label">Check Out</div>
                    <div class="date_div">
                        <input type="text" class="js_calendar desctop-input">
                        <input type="date" class="mobile-input">
                        <div class="day"><?=date("d", strtotime("+3 days"))?></div>
                        <div class="date_div_right">
                            <div class="month"><?=date("M")?></div>
                            <div class="year"><?=date("Y")?></div>
                        </div>
                    </div>
                </div>
                <div class="num-col">
                    <div class="label">Tamu</div>
                    <div class="num_wrap">
                        <div class="buttons">
                            <button class="plus"></button>
                            <button class="minus"></button>
                        </div>
                        <input type="number" class="val js_num" value="2" min="0" max="99">
                    </div>
                </div>
                <button class="btn button"><span>Cari</span></button>
            </div>
        </div>
    </div>
</div>
-->
<div class="most_popular">
    <div class="wrap">
        <div class="wrap_float">
            <div class="title_wrap">
                <h2 class="title">Destinasi Wisata</h2>
                <p class="subtitle">
                    Berbagai Destinasi yang dapat anda kunjungi saat berwisata di Kota Baubau
                </p>
                <div class="controls">
                    <a href="{{ route('touristAttraction.index') }}" class="link">Lihat Selengkapnya</a>
                    <div class="arrows">
                        <div class="arrow prev"></div>
                        <div class="arrow next"></div>
                    </div>
                </div>
            </div>
            <div class="section_content">
                <div class="tour-slider" id="tour-slider">
                    @foreach ($touristAttraction as $ta)
                    <a href="{{ route('touristAttraction.show', ['category' => (new \YukTripAPI())->getTouristAttractionCategoryById($ta->category_id)->slug, 'touristAttraction' => $ta->slug]) }}" class="tour_item" style="background-image: url({{ asset(\YukTripAPI::getImageByType($ta->images, 'main'))}})">
                        <div class="tour_item_bottom">
                            <h3 class="_title">{{ $ta->name }}</h3>
                            <div class="_info">
                                <div class="_info_left">
                                    <div class="days">{{ $ta->address }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="destinations">
    <div class="wrap">
        <div class="wrap_float">
            <div class="title_wrap">
                <h2 class="title">Kuliner Terbaik</h2>
                <p class="subtitle">
                    Berbagai Makanan dan Minuman yang bisa anda cicipi di Kota Baubau
                </p>
                <div class="controls">
                    <a href="travel-list-image-header.html" class="link">Lihat semua daftar kuliner</a>
                </div>
            </div>
            <div class="section_content">
                <div class="scroll">
                    <a href="travel-list-full-width.html" class="destinations_item" style="background-image: url(img/demo-bg.jpg)">
                        <div class="sq_parent">
                            <div class="sq_wrap">
                                <div class="sq_content">
                                    <div class="_content">
                                        <h3 class="_title">Parende Mama Ardan</h3>
                                        <p class="_info">Seafood</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </a>

                    <a href="travel-list-full-width.html" class="destinations_item" style="background-image: url(img/demo-bg.jpg)">
                        <div class="sq_parent">
                            <div class="sq_wrap">
                                <div class="sq_content">
                                    <div class="_content">
                                        <h3 class="_title">Coto Makassar Laguntu</h3>
                                        <p class="_info">Kuliner Lokal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </a>

                    <a href="travel-list-full-width.html" class="destinations_item" style="background-image: url(img/demo-bg.jpg)">
                        <div class="sq_parent">
                            <div class="sq_wrap">
                                <div class="sq_content">
                                    <div class="_content">
                                        <h3 class="_title">Ikan Bakar Pantai Kamali</h3>
                                        <p class="_info">Kuliner Lokal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </a>

                    <a href="travel-list-full-width.html" class="destinations_item" style="background-image: url(img/demo-bg.jpg)">
                        <div class="sq_parent">
                            <div class="sq_wrap">
                                <div class="sq_content">
                                    <div class="_content">
                                        <h3 class="_title">AR Food</h3>
                                        <p class="_info">Kuliner Lokal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog">
    <div class="wrap">
        <div class="wrap_float">
            <div class="title_wrap">
                <h2 class="title">Berita Terbaru</h2>
                <div class="controls">
                    <a href="blog-right-sidebar.html" class="link">Lihat semua berita</a>
                </div>
            </div>
            <div class="section_content">
                <a href="blog-single-right-sidebar.html" class="blog_item">
                    <div class="blog_item_top" style="background-image: url(img/demo-bg.jpg);">
                        <div class="sq_parent">
                            <div class="sq_wrap">
                                <div class="sq_content">
                                    <div class="tags">
                                        <div class="tag red">Stream</div>
                                        <div class="tag green">Countries</div>
                                    </div>
                                    <h3 class="_title">
                                        Most popular destinations destinations
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </div>
                    <div class="blog_item_bottom">
                        <div class="author">
                            <div class="userpic">
                                <img src="img/demo-bg.jpg" alt="">
                            </div>
                            <div class="date">21.09.2019 by Maya Delia</div>
                        </div>
                        <p class="text">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        </p>
                    </div>
                </a>

                <a href="blog-single-right-sidebar.html" class="blog_item">
                    <div class="blog_item_top" style="background-image: url(img/demo-bg.jpg);">
                        <div class="sq_parent">
                            <div class="sq_wrap">
                                <div class="sq_content">
                                    <div class="tags">
                                        <div class="tag blue">Video</div>
                                    </div>
                                    <h3 class="_title">
                                        Most popular destinations destinations
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </div>
                    <div class="blog_item_bottom">
                        <div class="author">
                            <div class="userpic">
                                <img src="img/demo-bg.jpg" alt="">
                            </div>
                            <div class="date">20.09.2019 by Victor Shibut</div>
                        </div>
                        <p class="text">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        </p>
                    </div>
                </a>

                <a href="blog-single-right-sidebar.html" class="blog_item">
                    <div class="blog_item_top" style="background-image: url(img/demo-bg.jpg);">
                        <div class="sq_parent">
                            <div class="sq_wrap">
                                <div class="sq_content">
                                    <div class="tags">
                                        <div class="tag black">Trips</div>
                                    </div>
                                    <h3 class="_title">
                                        Most popular destinations destinations
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </div>
                    <div class="blog_item_bottom">
                        <div class="author">
                            <div class="userpic">
                                <img src="img/demo-bg.jpg" alt="">
                            </div>
                            <div class="date">21.09.2019 by Maya Delia</div>
                        </div>
                        <p class="text">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@include('social.instagram-post')
@endsection

@section('content_scripts')
<script type="text/javascript">
function playVideo(){
    $('#myVideo').fadeIn(300);
    $('#myVideo').trigger('play');
    $('#backgroundImage').hide();
    $('.first_slide').fadeOut(300);
}
function pauseVideo(){
    $('#myVideo').fadeOut(300);
    $('#myVideo').trigger('pause');
    $('#backgroundImage').show();
    $('.first_slide').fadeIn(300);
}
</script>
@endsection