<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

use Illuminate\Support\Arr;

use YukTripAPI;

class HotelController extends Controller
{
    private $yukTripAPI = null;

    const ITEM_PER_PAGE = 4;

    public function __construct() {
        $this->yukTripAPI =  new YukTripAPI();
    }
    public function index(Request $request)
    {
        $searchParams = $request->all();
        $allHotels = $this->yukTripAPI->getAllHotel();

        $page = (int)Arr::get($searchParams, 'page', 1);
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);

        $totalPage = (int)ceil(count($allHotels) / $limit);

        $offset = ($page-1) * $limit;
        if($offset < 0) $offset = 0;
        
        $hotels = array_slice($allHotels, $offset, $limit);

        if($hotels !== null){
            return view('pages.akomodasi.index', ['datas' => $hotels, 'route'=> 'hotel', 'title' => 'Hotel', 'topPanelInversion' => "inversion", 'totalPage' => $totalPage, 'page' => $page]);
        }
    }
    public function show($slug)
    {
        $hotel = $this->yukTripAPI->getHotelBySlug($slug);
        if($hotel !== null){
            return view('pages.akomodasi.show', ['data' => $hotel, 'route'=> 'guestHouse', 'title' => 'Penginapan', 'topPanelInversion' => "inversion"]);
        }
    }
}
