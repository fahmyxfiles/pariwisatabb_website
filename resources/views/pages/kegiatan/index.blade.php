@extends('app')

@section('title') Daftar Kegiatan - Visit Baubau @endsection

@section('content')
<div class="breadcrumbs" style="margin-top:28px">
    <div class="wrap">
        <div class="wrap_float">
            <a href="#">Utama</a>
            <span class="separator">/</span>
            <a href="#">Kegiatan</a>
        </div>
    </div>
</div>
<div class="page default travel-list full-width">
    <div class="page_head">
        <div class="wrap_float">
            <div class="wrap">
                <div class="wrap_float">
                    <h1 class="title">
                        Daftar Kegiatan
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="page_body">
        <div class="wrap">
            <div class="wrap_float">
                <div class="posts">
                    @foreach($datas as $data)
                    <a href="{{ route('event.show', ['name' => $data['slug']]) }}" class="tour_item" style="background-image: url({{ asset('storage/events' . $data['image_filename']) }})">
                        <div class="tour_item_bottom">
                            <h3 class="_title">{{ $data['name'] }}</h3>
                        </div>
                        <div class="shadow js-shadow"></div>
                    </a>
                    @endforeach
                </div>
                <div class="pagination">
                    @if(($page-1) >= 1)
                    <a href="{{ route('event.index', ['page' => $page-1]) }}" class="arrow prev"></a>
                    @endif
                    <ul>
                        @for($i = 1; $i < $totalPage+1; $i++)
                        <li><a href="{{ route('event.index', ['page' => $i]) }}" class="@if($page == $i) active @endif">{{ $i }}</a></li>
                        @endfor
                    </ul>
                    @if(($page+1) <= $totalPage)
                    <a href="{{ route('event.index', ['page' => $page+1]) }}" class="arrow next"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection