<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\AccommRepository;

class AccommController extends Controller
{
    protected $accommRepository;

    public function __construct(){
    	$this->accommRepository = new AccommRepository();
    }

    public function accommlist($type) {
    	// get city list
    	$accomms = $this->accommRepository->getAccomlist($type);
    	return view('Customer.search_accom', compact('accomms'));
    }
}
