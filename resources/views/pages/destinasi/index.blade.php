@extends('app')

@section('title') Daftar {{ $title }} - Visit Baubau @endsection

@section('content')
<div class="breadcrumbs white-color" style="margin-top: 28px;">
            <div class="wrap">
                <div class="wrap_float">
                    <a href="#">Home</a>
                    <span class="separator">/</span>
                    <a href="#">Destinasi</a>
                    @if (!empty($categoryData))
                    <span class="separator">/</span>
                    <a href="#">{{ $categoryData->name }}</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="gallery-page">
            <div class="wrap">
                <div class="wrap_float">
                    <div class="gallery-page-head">
                        <h1 class="title">{{ $title }}</h1>
                    </div>
                    <div class="gallery-page-body">
                        <div class="gallery-list">
                            @foreach ($datas as $ta)
                            <a href="{{ route('touristAttraction.show', ['category' => (new \YukTripAPI())->getTouristAttractionCategoryById($ta->category_id)->slug, 'touristAttraction' => $ta->slug]) }}" class="gallery-item">
                                <div class="top">
                                    @empty($categoryData)
                                    <p class="country">{{ (new \YukTripAPI())->getTouristAttractionCategoryById($ta->category_id)->name }}</p>
                                    @endempty
                                    <p class="title">{{ $ta->name }}</p>
                                </div>
                                <div class="images">
                                    <div class="scroll">
                                        @foreach($ta->images as $image)
                                        <div class="img">
                                            <img src="{{ asset('storage/' . $image->image_filename)}}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="pagination">
                            <?php
                            $category = null;
                            if(!empty($categoryData)){
                                $category = $categoryData->slug;
                            }
                            ?>
                            @if(($page-1) >= 1)
                            <a style="color: white;" href="{{ route('touristAttraction.index', ['category' => $category, 'page' => $page-1]) }}" class="arrow prev"></a>
                            @endif
                            <ul>
                                @for($i = 1; $i < $totalPage+1; $i++)
                                <li><a style="color: white;" href="{{ route('touristAttraction.index', ['category' => $category, 'page' => $i]) }}" class="@if($page == $i) active @endif">{{ $i }}</a></li>
                                @endfor
                            </ul>
                            @if(($page+1) <= $totalPage)
                            <a style="color: white;" href="{{ route('touristAttraction.index', ['category' => $category, 'page' => $page+1]) }}" class="arrow next"></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection

@section('content_scripts')

@endsection