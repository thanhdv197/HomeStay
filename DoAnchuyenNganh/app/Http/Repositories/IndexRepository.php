<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\City;
use App\Http\Models\AccommodationType;

class IndexRepository
{
    protected $city;
    protected $accommodation_type;

    public function __construct(){
        $this->city = new City();
        $this->accommodation_type = new AccommodationType();
    }
    
    // get city list for index page
    public function getCity()
    {
        return $this->city->select('city_name', 'city_img', 'id')
                            ->withCount('post')
                            ->where('flag_delete', 0)
                            ->orderBy('created_at', 'desc')
                            ->limit(8)->get();
    }

    // get accommodation type list for index page
    public function getAccommodationType()
    {
        return $this->accommodation_type->select('accommodation_type_name', 'accommodation_type_img', 'id')
                                        ->withCount('post')
                                        ->where('flag_delete', 0)
                                        ->get();
    }
}
