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
            <div class="page_body">

                <div class="page_image">
                    <img src="asset('storage/' . $event->image_filename)" alt="Poster" />
                </div>
                {!! $event->contents !!}

                <div class="buttons">
                    <a href="#" class="btn button" tabindex="0">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('social.instagram-post')
@endsection