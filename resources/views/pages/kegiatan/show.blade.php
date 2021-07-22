@extends('app')

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
                {!! $event->contents !!}
            </div>
        </div>
    </div>
</div>
@include('social.instagram-post')
@endsection