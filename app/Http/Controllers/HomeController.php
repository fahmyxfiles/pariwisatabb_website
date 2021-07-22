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
    public function index(Request $request)
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

    private function tampilHalaman(Request $request, $page, $sub_halaman){
        $page = Page::where('name', $page)->first();
        if($page){
            $instagramPost = $this->yukTripAPI->getTopInstagramPost("baubau");
            shuffle($instagramPost);
            $instagramPost = array_slice($instagramPost, 0, 5);
            return view('pages.halaman.index', ['page' => $page, 'sub_halaman' => $sub_halaman, 'topPanelInversion' => "inversion", 'instagramPost' => $instagramPost]);
        }
    }

    public function transportasi(Request $request){
       return $this->tampilHalaman('transportasi', 'Akomodasi');
    }

    public function profil(Request $request, $page)
    {
        return $this->tampilHalaman($page, 'Profil');
    }


    public function daftar_kegiatan(Request $request){
        $searchParams = $request->all();
        $allEvents = Event::all()->toArray();

        $page = (int)Arr::get($searchParams, 'page', 1);
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);

        $totalPage = (int)ceil(count($allEvents) / $limit);

        $offset = ($page-1) * $limit;
        if($offset < 0) $offset = 0;
        
        $events = array_slice($allEvents, $offset, $limit);

        if($events !== null){
            return view('pages.kegiatan.index', ['datas' => $events, 'topPanelInversion' => "inversion", 'totalPage' => $totalPage, 'page' => $page]);
        }
    }

    public function kegiatan(Request $request, $slug){
        $event = Event::where('slug', $slug)->first();
        if($event){
            $instagramPost = $this->yukTripAPI->getTopInstagramPost("baubau");
            shuffle($instagramPost);
            $instagramPost = array_slice($instagramPost, 0, 5);
            return view('pages.kegiatan.show', ['event' => $event, 'topPanelInversion' => "inversion", 'instagramPost' => $instagramPost]);
        }
    }
}
