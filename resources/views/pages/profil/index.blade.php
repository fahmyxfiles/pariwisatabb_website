@extends('app')

@section('title') {{ $page->title }} - Visit Baubau @endsection

@section('content')
<div class="breadcrumbs" style="margin-top: 23px;">
    <div class="wrap">
        <div class="wrap_float">
            <a href="#">Utama</a>
            <span class="separator">/</span>
            <a href="#">Profil</a>
            <span class="separator">/</span>
            <a href="#">{{ $page->title }}</a>
        </div>
    </div>
</div>
<div class="page blog-list-page blog-single-page static-page right-sidebar">
    <div class="wrap">
        <div class="wrap_float">
            <div class="page_head">
                <h1 class="title">{{ $page->title }}</h1>
            </div>
            <div class="page_body">
                {!! $page->contents !!}
            </div>
        </div>
    </div>
</div>
@include('social.instagram-post')
@endsection