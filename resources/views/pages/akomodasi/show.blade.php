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
                    <a href="#">Hotel</a>
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
    <div class="search-tour">
        <div class="wrap">
            <div class="wrap_float">
                <div class="search-form">
                    <div class="date-col">
                        <div class="label">Menginap</div>
                        <div class="date_div">
                            <input type="text" id="checkInDate" class="js_calendar desctop-input">
                            <input type="date" class="mobile-input">
                            <div class="day"></div>
                            <div class="date_div_right">
                                <div class="month"></div>
                                <div class="year"></div>
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
                    <button class="btn button" onclick="searchPricing()"><span>Cari</span></button>
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
                    <div class="programm js-section content-block" id="programm-days">
                        <h2 class="title">Kamar</h2>
                        @foreach($data->rooms as $room)
                        <div class="day_item">
                            <div class="day_item-head">
                                <div class="preview">
                                    <div class="p" id="price_room_{{ $room->id }}">
                                        <?php 
                                            $lowest = null;
                                            foreach($room->pricings as $pricing){
                                                if($lowest == null){
                                                    $lowest = $pricing->price;
                                                }
                                                else {
                                                    if($pricing->price < $lowest){
                                                        $lowest = $pricing->price;
                                                    }
                                                }
                                            }
                                            
                                            echo \YukTripAPI::rupiah($lowest);
                                        ?>
                                    </div>
                                </div>
                                <div class="_title">{{ $room->name }}</div>
                                <div class="element"></div>
                            </div>
                            <div class="day_item-body" style="display: none; padding-bottom: 0px;">
                                <div class="text">
                                    {{ $room->description }}
                                </div>
                                <div class="container" style="display: flex;">
                                    <div class="subtitle">
                                        Jumlah Tamu
                                        <p style="color:black; font-size:20px; margin-top: 8px;margib-bottom:20px;">
                                            {{ $room->num_of_guest }} Orang
                                        </p>
                                    </div>
                                    <div class="subtitle">
                                        Ukuran Ruangan
                                        <p style="color:black; font-size:20px; margin-top: 8px;margib-bottom:20px;">
                                            {{ $room->room_size }} m2
                                        </p>
                                    </div>
                                    <div class="subtitle">
                                        Ukuran Tempat Tidur
                                        <p style="color:black; font-size:20px; margin-top: 8px;margib-bottom:20px;">
                                            {{ ucfirst($room->bed_size) }}
                                        </p>
                                    </div>
                                </div>
                                <?php 
                                    $roomImage = array_filter($data->images, function ($image) use($room) {
                                        return $image->hotel_room_id === $room->id;
                                    });
                                ?>
                                @empty($roomImage)
                                    
                                @else
                                <div class="images">
                                    <div class="scroll lightgallery">
                                        @foreach($roomImage as $image)
                                        <a href="{{ asset('storage/'.$image->image_filename) }}" class="item">
                                            <div class="img">
                                                <img src="{{ asset('storage/'.$image->image_filename) }}" alt="">
                                            </div>
                                            <span>{{ $image->name }}</span>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="included" style="margin-top: 30px; margin-bottom: 0px;">
                                    <ul>
                                        @foreach($room->facilities as $facility)
                                            <li>
                                                <span class="li_title">{{ $facility->name }}</span>
                                                <span class="li_subtitle">{{ $facility->category->name }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                            <li><a href="#programm-days">Kamar</a></li>
                            <li><a href="#included">Fasilitas</a></li>
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
@endsection


@section('content_scripts')
<script type="text/javascript">
var rooms = @json($data->rooms);

function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function searchPricing(){
    var dateCheckIn = $("#checkInDate").val();
    var date = new Date(dateCheckIn);
    var day = date.getDay();
    var pricingType = 'Date';
    if(day => 1 && day <= 5){
        pricingType = 'Weekday';
    }
    else if(day == 0 || day <= 6){
        pricingType = 'Weekend';
    }
    rooms.forEach((room) => {
        var pricing = room.pricings;
        var showPricing = null;
        for(var i = 0; i < pricing.length; i++){
            var cur = pricing[i];
            if(cur.type == 'Date'){
                var dateCursor = new Date(cur.date);
                if(dateCursor.getDate() == date.getDate() && dateCursor.getMonth() == date.getMonth() && dateCursor.getYear() == date.getYear()){
                    showPricing = cur.price;
                }
            }
        }
        if(showPricing !== null){
            $("#price_room_" + room.id).html(formatRupiah(showPricing.toString(), "Rp. "));
        }
        else {
            for(var i = 0; i < pricing.length; i++){
                var cur = pricing[i];
                if(cur.type == pricingType){
                    showPricing = cur.price;
                    break;
                }
            }
            $("#price_room_" + room.id).html(formatRupiah(showPricing.toString(), "Rp. "));
        }
    });
}
</script>
@endsection