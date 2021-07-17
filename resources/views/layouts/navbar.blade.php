<div class="top_panel {{ $topPanelInversion ?? "123" }}">
    <div class="wrap">
        <div class="wrap_float">
            <div class="left">
                <a href="{{ route('utama') }}" class="logo">
                    <img src="{{ URL::to('/img/logo_inversed.png') }}" alt="" style="width:240px; height:auto;">
                </a>
            </div>
            <div class="menu_wrap" id="menu_wrap" style="margin-top: 30px">
                <div class="scroll">
                    <div class="center">
                        <div class="menu">
                            <ul>
                                <li class="dropdown_li">
                                    <a href="#" class=""><span>Profil</span></a>
                                    <ul class="dropdown_ul">
                                        <li><a href="{{ route('profil.index', ['page' => 'struktur-organisasi']) }}">Struktur Organisasi</a></li>
                                        <li><a href="{{ route('profil.index', ['page' => 'visi-misi']) }}">Visi Misi</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><span>Berita</span></a></li>
                                <li><a href="#"><span>Kegiatan</span></a></li>
                                <li class="dropdown_li">
                                    <a href="#"><span>Akomodasi</span></a>
                                    <ul class="dropdown_ul">
                                        <li><a href="{{ route('hotel.index') }}">Hotel</a></li>
                                        <li><a href="{{ route('guestHouse.index') }}">Penginapan</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown_li">
                                    <a href="#"><span>Destinasi</span></a>
                                    <ul class="dropdown_ul">
                                        @foreach((new \YukTripAPI())->getAllTouristAttractionCategory() as $category)
                                        <li><a href="{{ route('touristAttraction.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown_li">
                                    <a href="#"><span>Kuliner</span></a>
                                    <ul class="dropdown_ul">
                                        <li><a href="#">Tempat Makan</a></li>
                                        <li><a href="#">Kategori</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown_li">
                                    <a href="#"><span>Budaya</span></a>
                                    <ul class="dropdown_ul">
                                        <li><a href="#">Kerajinan</a></li>
                                        <li><a href="#">Benteng</a></li>
                                        <li><a href="#">Tari-tarian</a></li>
                                        <li><a href="#">Kegiatan Budaya</a></li>
                                        <li><a href="#">Bahasa</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><span>Tentang</span></a></li>
                            </ul>
                            <div class="mobile_content" style="padding-top: 25px;">
                                <div class="social">
                                    <a href="#" class="link facebook"><span></span></a>
                                    <a href="#" class="link instagram"><span></span></a>
                                    <a href="#" class="link pinterest"><span></span></a>
                                    <a href="#" class="link twitter"><span></span></a>
                                    <a href="#" class="link youtube"><span></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="close" id="menu-close">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile_btn" id="mobile_btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</div>
