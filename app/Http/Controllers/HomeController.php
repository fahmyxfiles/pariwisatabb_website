<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Event;

use YukTripAPI;

class HomeController extends Controller
{
    private $regencyId = 1;

    private $yukTripAPI = null;

    public function __construct() {
        $this->yukTripAPI =  new YukTripAPI();
    }
    public function index()
    {
        $touristAttraction = $this->yukTripAPI->getAllTouristAttraction($this->regencyId);
        $touristAttraction = array_slice($touristAttraction, 0, 5);

        $instagramPost = $this->yukTripAPI->getTopInstagramPost("baubau");
        shuffle($instagramPost);
        
        $instagramPost = array_slice($instagramPost, 0, 5);
        return view('pages.home', ['topPanelInversion' => 'inversion', 'touristAttraction' => $touristAttraction, 'instagramPost' => $instagramPost]);
    }

    public function cronjob(){
        $this->yukTripAPI->fetchHotelData(1);
        $this->yukTripAPI->fetchGuestHouseData(1);
        $this->yukTripAPI->fetchTouristAttractionData(1);
        $this->yukTripAPI->fetchTouristAttractionCategoryData();
        //$this->yukTripAPI->fetchTopInstagramPost('baubau', ['kotabaubau', 'baubaucity', 'baubausultra']);
    }

    private function tampilHalaman($page, $sub_halaman){
        $page = Page::where('name', $page)->first();
        if($page){
            $instagramPost = $this->yukTripAPI->getTopInstagramPost("baubau");
            shuffle($instagramPost);
            $instagramPost = array_slice($instagramPost, 0, 5);
            return view('pages.halaman.index', ['page' => $page, 'sub_halaman' => $sub_halaman, 'topPanelInversion' => "inversion", 'instagramPost' => $instagramPost]);
        }
    }

    public function transportasi(){
       return $this->tampilHalaman('transportasi', 'Akomodasi');
    }

    public function profil($page)
    {
        return $this->tampilHalaman($page, 'Profil');
    }


    public function daftar_kegiatan(){
        
    }

    public function kegiatan($slug){
        $event = Event::where('slug', $slug)->first();
        if($event){
            $instagramPost = $this->yukTripAPI->getTopInstagramPost("baubau");
            shuffle($instagramPost);
            $instagramPost = array_slice($instagramPost, 0, 5);
            return view('pages.kegiatan.show', ['event' => $event, 'topPanelInversion' => "inversion", 'instagramPost' => $instagramPost]);
        }
    }
}
