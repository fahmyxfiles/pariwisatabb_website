<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;


class YukTripAPI
{

    private $baseUrl = "https://admin.visitbaubau.id";

    private function getInstagramExploreMedia($hashtag){
        $targetUrl = "https://www.instagram.com/explore/tags/$hashtag/?__a=1";
        $ch = curl_init();

        $headers = [
        'cookie: mid=YJLDYwALAAHj-C7-7auExpXE-IN4; ig_did=BE909119-E13D-450A-8CBA-CF3334B755C5; ig_nrcb=1; fbm_124024574287414=base_domain=.instagram.com; csrftoken=gVECFuYzi6I8UMfFLSM3yqbiMuSZu5O6; ds_user_id=23385947329; sessionid=23385947329%3AaiyjlSMoWmwwX1%3A14; shbid="19774\05423385947329\0541657116650:01f7308dec609ba274688fe1df40f742066cfe9dc19d8652f489caaffc228b7edab09ceb"; shbts="1625580650\05423385947329\0541657116650:01f7b188d4f15581a4a3ee4d1f4ad4cae86d7dd2bb32967aa9edc4e9d64bebc20679ae89"; fbsr_124024574287414=uxPDbnyuNNSgBWFguMhB0Xsnra-GHln5Rkw3GclCaeU.eyJ1c2VyX2lkIjoiMTAwMDA5Mzg1NTU4NDkyIiwiY29kZSI6IkFRQ2VidzVxZTBDTi1rb2FsekR2QUtFaWV1TjJEeUZFMnBubzBDYTNYcEVNVUs2QzJKbVJIRTJkT3Z4dFNWMlNYUk5nVWQ0NVlvQ25ybTdaVE95cVdrQnhEZkRTR2h0REstWUpOd2hPdjBjMlRYZGR3eFBoT3JyN0tjQVB3Vm5xQ0E5cFdLWEpHR1JOUkdDZlIzaFVueThpUVYyaHVORUZvemdEYWhfblNaZGJKR0xyOE5PRGd2eEJYS2g4UEZueWdOdEd3Z3dNaFNiT1VzT1Z0Z01iX0dJRFlGWHExLXlNWC1PcmNJSDR5blZzM1dIM2pUa3c3REl3Q0FTT3hCVEdvWjV5c1BvRDZId1dqZUx0VHRBOXgzcHV0cnZqVjYtTGJ6QklBeXRCYXdEZlJjZ3g3eHhSUGsya3VTMldVcmZRZGlrIiwib2F1dGhfdG9rZW4iOiJFQUFCd3pMaXhuallCQUxHN29jOEJTRFZyVFhXdW5xM0JBakNXVFhTYkVIZm5QSldzZVJwb0toaUNYaEZOVkhnajg3QThLV3U2WXlZUzdVOTRLTm9nd2ZUdWoxRkJmdHhYeUs2b1pDblpBUkl6QzZCY3pMVjJ3cDdJZ3JTWkFzUVhxUmRYM2FLRHdKQ0ZSRmI3WGg2VXRYcTh6SGZxUFpCOVdrM3VmSDVjOTIwaTY4YjljaGxaQVV0eDdvYzBibW8wWkQiLCJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImlzc3VlZF9hdCI6MTYyNTU4NzA5Mn0; rur="PRN\05423385947329\0541657126386:01f7b9dab7031027d18a1a366cdcb2225db1c3efffad9547036a41cc11d2eb0eda5aec88"',
        'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Mobile Safari/537.36'];
        curl_setopt($ch, CURLOPT_URL, $targetUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);  
       

        return json_decode($result, false);
    }

    private function makeRequest($method, $endPoint, $params = null)
    {

        $targetUrl = $this->baseUrl . $endPoint;
        if($method == "GET" && $params !== null){
            $targetUrl .= "?" . http_build_query($params);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $targetUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if($method == "POST"){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);  
        
        return $result;
    }

    public function fetchHotelData($regency_id){
        $result = $this->makeRequest("GET", 
                                    "/json/hotel", 
                                    ['regency_id' => $regency_id, 
                                    'scope' => 'images,rooms,rooms.pricings,rooms.facilities.category,facilities,facilities.category', 
                                    'paginate' => ''
                                    ]
                                );
        $data = json_decode($result, true);
        foreach($data['data'] as $hotelIndex => $hotel){
            foreach($hotel['images'] as $imageIndex => $image){
                $filename = $image['image_filename'];
                $contents = file_get_contents($this->baseUrl . "/" . $filename);
                Storage::disk('public')->put($filename, $contents);
                set_time_limit(0);
            }
            $data['data'][$hotelIndex]['slug'] = Str::slug($hotel['name']);
        }
        Storage::disk('public')->put('hotel.json', json_encode($data['data']));
        return $result;
    }

    public function getAllHotel()
    {
        $data = Storage::disk('public')->get('hotel.json');
        return json_decode($data, false);
    }

    public function getHotelBySlug($slug)
    {
        $data = Storage::disk('public')->get('hotel.json');
        $array = json_decode($data, false);
        return Arr::first($array, function ($value, $key) use ($slug) {
            return $value->slug == $slug;
        });
    }

    public function fetchGuestHouseData($regency_id){
        $result = $this->makeRequest("GET", 
                                    "/json/guest_house", 
                                    ['regency_id' => $regency_id, 
                                    'scope' => 'images,rooms,rooms.pricings,rooms.facilities.category,facilities,facilities.category', 
                                    'paginate' => ''
                                    ]
                                );
        $data = json_decode($result, true);
        foreach($data['data'] as $guestHouseIndex => $guestHouse){
            foreach($guestHouse['images'] as $imageIndex => $image){
                $filename = $image['image_filename'];
                $contents = file_get_contents($this->baseUrl . "/" . $filename);
                Storage::disk('public')->put($filename, $contents);
                set_time_limit(0);
            }
            $data['data'][$guestHouseIndex]['slug'] = Str::slug($guestHouse['name']);
        }
        Storage::disk('public')->put('guest_house.json', json_encode($data['data']));
        return $result;
    }

    public function getAllGuestHouse()
    {
        $data = Storage::disk('public')->get('guest_house.json');
        return json_decode($data, false);
    }

    public function getGuestHouseBySlug($slug)
    {
        $data = Storage::disk('public')->get('guest_house.json');
        $array = json_decode($data, false);
        return Arr::first($array, function ($value, $key) use ($slug) {
            return $value->slug == $slug;
        });
    }

    public function fetchTouristAttractionCategoryData(){
        $result = $this->makeRequest("GET", 
                                     "/json/tourist_attraction_category", 
                                     [ 'paginate' => '' ]
                                    );
        $data = json_decode($result, true);
        foreach($data['data'] as $touristAttractionCategoryIndex => $touristAttractionCategory){
            $data['data'][$touristAttractionCategoryIndex]['slug'] = Str::slug($touristAttractionCategory['name']);
        }
        Storage::disk('public')->put('tourist_attraction_category.json', json_encode($data['data']));
        return $result;
    }

    public function getAllTouristAttractionCategory()
    {
        $data = Storage::disk('public')->get('tourist_attraction_category.json');
        return json_decode($data, false);
    }

    public function getTouristAttractionCategoryBySlug($slug)
    {
        $data = Storage::disk('public')->get('tourist_attraction_category.json');
        $array = json_decode($data, false);
        return Arr::first($array, function ($value, $key) use ($slug) {
            return $value->slug == $slug;
        });
    }
    public function getTouristAttractionCategoryById($id)
    {
        $data = Storage::disk('public')->get('tourist_attraction_category.json');
        $array = json_decode($data, false);
        return Arr::first($array, function ($value, $key) use ($id) {
            return $value->id == $id;
        });
    }

    public function fetchTouristAttractionData($regency_id){
        $result = $this->makeRequest("GET", 
                                     "/json/tourist_attraction", 
                                     ['regency_id' => $regency_id, 
                                      'scope' => 'images,pricings,facilities,facilities.category', 
                                      'paginate' => ''
                                     ]
                                    );
        $data = json_decode($result, true);
        foreach($data['data'] as $touristAttractionIndex => $touristAttraction){
            foreach($touristAttraction['images'] as $imageIndex => $image){
                $filename = $image['image_filename'];
                $contents = file_get_contents($this->baseUrl . "/" . $filename);
                Storage::disk('public')->put($filename, $contents);
                set_time_limit(0);
            }
            $data['data'][$touristAttractionIndex]['slug'] = Str::slug($touristAttraction['name']);
        }
        Storage::disk('public')->put('tourist_attraction.json', json_encode($data['data']));
        return $result;
    }

    public function getAllTouristAttraction()
    {
        $data = Storage::disk('public')->get('tourist_attraction.json');
        return json_decode($data, false);
    }

    public function getTouristAttractionBySlug($slug)
    {
        $data = Storage::disk('public')->get('tourist_attraction.json');
        $array = json_decode($data, false);
        return Arr::first($array, function ($value, $key) use ($slug) {
            return $value->slug == $slug;
        });
    }

    public function fetchTopInstagramPost($hashtag_key, $hashtags = []){
        $imageData = [];
        foreach ($hashtags as $hashtag){
            $exploreData = $this->getInstagramExploreMedia($hashtag);
            $data = $exploreData->data->top;
            foreach($data->sections as $section){
                foreach($section->layout_content->medias as $medias) {
                    $post = $medias->media;
                    if($post->media_type == 1){
                        if(isset($post->carousel_media)){
                            $fileUrl = $post->carousel_media[0]->image_versions2->candidates[0]->url;
                            $imageData[] = ['hashtag' => $hashtag, 'id' => $post->id, 'code' => $post->code, 'url' => $fileUrl, 'filename' => explode("?", basename($fileUrl))[0] ];
                        }
                        if(isset($post->image_versions2)){
                            $fileUrl = $post->image_versions2->candidates[0]->url;
                            $imageData[] = ['hashtag' => $hashtag, 'id' => $post->id, 'code' => $post->code, 'url' => $fileUrl, 'filename' => explode("?", basename($fileUrl))[0] ];
                        }
                    }
                }
            }
        }
        
        foreach($imageData as $image){
            $filename = $image['filename'];
            $contents = file_get_contents($image['url']);
            Storage::disk('public')->put("instagram/media/$filename", $contents);
        }

        Storage::disk('public')->put("instagram/hashtags/$hashtag_key.json", json_encode($imageData));
    }

    public function getTopInstagramPost($hashtag_key)
    {
        $data = Storage::disk('public')->get("instagram/hashtags/$hashtag_key.json");
        return json_decode($data, false);
    }
    public static function getImageByType($images, $type){
        $imageRet = null;
        foreach($images as $image){
            if($image->type == $type){
                $imageRet = "storage/" . $image->image_filename;
                break;
            }
        }
        if($imageRet == null){
            if($type == "main"){
                return "img/demo-bg.jpg";
            }
            if($type == "banner"){
                return "img/default-banner.jpg";
            }
        }
        return $imageRet;
    }

    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}