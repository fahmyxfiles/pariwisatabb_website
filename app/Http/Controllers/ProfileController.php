<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

use YukTripAPI;

class ProfileController extends Controller
{
    private $yukTripAPI = null;

    public function __construct() {
        $this->yukTripAPI =  new YukTripAPI();
    }
    public function index($page)
    {
        $page = Page::where('name', $page)->first();
        if($page){
            $instagramPost = $this->yukTripAPI->getTopInstagramPost("baubau");
            shuffle($instagramPost);
            $instagramPost = array_slice($instagramPost, 0, 5);
            return view('pages.profil.index', ['page' => $page, 'topPanelInversion' => "inversion", 'instagramPost' => $instagramPost]);
        }
    }
}
