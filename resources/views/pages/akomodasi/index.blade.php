@extends('app')

@section('title') Daftar {{ $title }} - Visit Baubau @endsection

@section('content')
<div class="breadcrumbs" style="margin-top:28px">
    <div class="wrap">
        <div class="wrap_float">
            <a href="#">Utama</a>
            <span class="separator">/</span>
            <a href="#">Akomodasi</a>
            <span class="separator">/</span>
            <a href="#">{{ $title }}</a>
        </div>
    </div>
</div>
<div class="page default travel-list full-width">
    <div class="page_head">
        <div class="wrap_float">
            <div class="wrap">
                <div class="wrap_float">
                    <h1 class="title">
                        Daftar {{ $title }}
                    </h1>
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
                            <div class="day">21</div>
                            <div class="date_div_right">
                                <div class="month">December</div>
                                <div class="year">2019</div>
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
                    <button class="btn button" onclick="searchPricing()" ><span>Cari</span></button>
                </div>
            </div>
        </div>
    </div>
    <div class="page_body">
        <div class="wrap">
            <div class="wrap_float">
                <div class="posts">
                    @foreach($datas as $data)
                    <a href="{{ route($route . '.show', [$route => $data->slug]) }}" class="tour_item" style="background-image: url({{ asset(\YukTripAPI::getImageByType($data->images, 'main')) }})">
                        <div class="tour_item_bottom">
                            <h3 class="_title">{{ $data->name }}</h3>
                            <div class="_info">
                                <div class="_info_left">
                                    <div class="cost">
                                    <?php 
                                        $lowest = null;
                                        foreach ($data->rooms as $room){
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
                                        }
                                    ?>
                                    Mulai dari @rupiah($lowest)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </a>
                    @endforeach
                </div>
                <div class="pagination">
                    @if(($page-1) >= 1)
                    <a href="{{ route($route . '.index', ['page' => $page-1]) }}" class="arrow prev"></a>
                    @endif
                    <ul>
                        @for($i = 1; $i < $totalPage+1; $i++)
                        <li><a href="{{ route($route . '.index', ['page' => $i]) }}" class="@if($page == $i) active @endif">{{ $i }}</a></li>
                        @endfor
                    </ul>
                    @if(($page+1) <= $totalPage)
                    <a href="{{ route($route . '.index', ['page' => $page+1]) }}" class="arrow next"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content_scripts')
<script type="text/javascript">
function searchPricing(){
    var dateCheckIn = $("#checkInDate").val();
    var date = new Date(dateCheckIn);
    var dt = (date.getYear()+1900) + "-" + String("00" + date.getMonth()).slice(-2) + "-" +  String("00" + date.getDate()).slice(-2);
    window.location = "{{ route($route . '.index') }}" + "?date=" + dt;
}
</script>
@endsection