@extends('app')

@section('meta_tags') 
<meta name="title" content="{{ $event->name }} - Visit Baubau">
<meta name="description" content="{{ strip_tags($event->contents) }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $event->name }} - Visit Baubau">
<meta property="og:description" content="{{ strip_tags($event->contents) }}">
<meta property="og:image" content="{{ asset('storage/' . $event->image_filename) }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ $event->name }} - Visit Baubau">
<meta property="twitter:description" content="{{ strip_tags($event->contents) }}">
<meta property="twitter:image" content="{{ asset('storage/' . $event->image_filename) }}">
@endsection

@section('title') {{ $event->name }} - Visit Baubau @endsection

@section('content')
<div class="breadcrumbs" style="margin-top: 23px;">
    <div class="wrap">
        <div class="wrap_float">
            <a href="#">Utama</a>
            <span class="separator">/</span>
            <a href="#">Kegiatan</a>
            <span class="separator">/</span>
            <a href="#">{{ $event->name }}</a>
        </div>
    </div>
</div>
<div class="page blog-list-page blog-single-page static-page right-sidebar">
    <div class="wrap">
        <div class="wrap_float">
            <div class="page_head">
                <h1 class="title">{{ $event->name }}</h1>
            </div>
            <div class="page_body" style="padding-right: 25vw;font-size: 18px;">

                <div class="page_image" style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $event->image_filename) }}" alt="Poster" style="width: 100%;height: auto;"/>
                </div>
                {!! $event->contents !!}

                @if($event->registrar_type == 'external_url' || $event->registrar_type == 'external_contact')
                <div class="buttons" style="transform: none;">
                    <a target="_blank" href="{{ $event->registrar_data }}" class="btn button" tabindex="0">Pendaftaran</a>
                </div>
                @endif

            </div>

            <div class="page_head">
                <h1 class="title">File Lampiran</h1>
            </div>
            <table class="sortable">
                <thead>
                    <tr>
                    <th>Filename</th>
                    <th>Type</th>
                    <th>Size <small>(bytes)</small></th>
                    <th>Date Modified</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class='$class'>
                        <td><a href='./$namehref'>$name</a></td>
                        <td><a href='./$namehref'>$extn</a></td>
                        <td><a href='./$namehref'>$size</a></td>
                        <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
                    </tr>");
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('social.instagram-post')
@endsection