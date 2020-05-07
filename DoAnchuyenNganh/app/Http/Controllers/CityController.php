<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\CityRepository;

class CityController extends Controller
{
    protected $cityRepository;

    public function __construct(){
    	$this->cityRepository = new CityRepository();
    }

    public function citylist($type) {
    	// get city list
    	$postcity = $this->cityRepository->getCitylist($type);

    	return view('Customer.search_city', compact('postcity'));

    }
}
