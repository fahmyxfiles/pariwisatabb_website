<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

use Illuminate\Support\Arr;

use YukTripAPI;

class TouristAttractionController extends Controller
{
    private $yukTripAPI = null;

    const ITEM_PER_PAGE = 4;

    public function __construct() {
        $this->yukTripAPI =  new YukTripAPI();
    }
    public function index(Request $request, $category = '')
    {
        $searchParams = $request->all();
        $allTouristAttractions = $this->yukTripAPI->getAllTouristAttraction();

        $title = "Semua Destinasi Wisata";
        $categoryData = null;
        if(!empty($category)){
            $categoryData = $this->yukTripAPI->getTouristAttractionCategoryBySlug($category);
            if($categoryData){
                $categoryId = $categoryData->id;
                $allTouristAttractions = Arr::where($allTouristAttractions, function ($value, $key) use ($categoryId){
                    return $value->category_id === $categoryId;
                });
                $title = "Destinasi Wisata " . $categoryData->name;
            }
        }

        $page = (int)Arr::get($searchParams, 'page', 1);
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);

        $totalPage = (int)ceil(count($allTouristAttractions) / $limit);

        $offset = ($page-1) * $limit;
        if($offset < 0) $offset = 0;
        
        $touristAttractions = array_slice($allTouristAttractions, $offset, $limit);

        if($touristAttractions !== null){
            return view('pages.destinasi.index', ['datas' => $touristAttractions, 'categoryData' => $categoryData, 'route'=> 'touristAttraction', 'title' => $title, 'topPanelInversion' => "inversion", 'totalPage' => $totalPage, 'page' => $page]);
        }
    }
    public function show($category, $slug)
    {
        $instagramPost = $this->yukTripAPI->getTopInstagramPost("baubau");
        shuffle($instagramPost);
        
        $instagramPost = array_slice($instagramPost, 0, 5);

        $touristAttraction = $this->yukTripAPI->getTouristAttractionBySlug($slug);
        if($touristAttraction !== null){
            return view('pages.destinasi.show', ['data' => $touristAttraction, 'route'=> 'touristAttraction','instagramPost' => $instagramPost, 'title' => 'Destinasi Wisata', 'topPanelInversion' => "inversion"]);
        }
    }
}
