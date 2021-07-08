<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

use Illuminate\Support\Arr;

use YukTripAPI;

class GuestHouseController extends Controller
{
    private $yukTripAPI = null;

    const ITEM_PER_PAGE = 4;

    public function __construct() {
        $this->yukTripAPI =  new YukTripAPI();
    }
    public function index(Request $request)
    {
        $searchParams = $request->all();
        $allGuestHouses = $this->yukTripAPI->getAllGuestHouse();

        $page = (int)Arr::get($searchParams, 'page', 1);
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);

        $totalPage = (int)ceil(count($allGuestHouses) / $limit);

        $offset = ($page-1) * $limit;
        if($offset < 0) $offset = 0;
        
        $guestHouses = array_slice($allGuestHouses, $offset, $limit);

        if($guestHouses !== null){
            return view('pages.akomodasi.index', ['datas' => $guestHouses, 'route'=> 'guestHouse', 'title' => 'Penginapan', 'topPanelInversion' => "inversion", 'totalPage' => $totalPage, 'page' => $page]);
        }
    }
    public function show($slug)
    {
        $guestHouse = $this->yukTripAPI->getGuestHouseBySlug($slug);
        if($guestHouse !== null){
            return view('pages.akomodasi.show', ['data' => $guestHouse, 'route'=> 'guestHouse', 'title' => 'Penginapan', 'topPanelInversion' => "inversion"]);
        }
    }
}
