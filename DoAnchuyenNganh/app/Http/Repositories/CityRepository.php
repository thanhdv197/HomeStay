<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\Post;




class CityRepository
{
    protected $city;

    public function __construct(){
        $this->city = new Post();

    }
    
    // get city list for index page
    public function getCitylist($type)
    {
        return $this->city->where('city_id',$type)
                            ->where('accommodation_status', 'đã duyệt')
                            ->with(['city', 'room', 'room.RoomType'])
                            ->paginate(4);
    }
}
