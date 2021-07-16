<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
