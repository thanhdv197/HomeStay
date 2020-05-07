<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\IndexRepository;

class IndexController extends Controller
{
    protected $indexRepository;

    public function __construct(){
        $this->indexRepository = new IndexRepository();
    }
    
    public function index() {
        // get city limit
        $cities = $this->indexRepository->getCity();
        // get accommodation type list
        $accommodation_types = $this->indexRepository->getAccommodationType();

        return view('Customer.index', compact('cities', 'accommodation_types'));
    }
}
