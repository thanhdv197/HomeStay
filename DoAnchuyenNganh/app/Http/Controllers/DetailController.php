<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\DetailRepository;

class DetailController extends Controller
{
    protected $detailRepository;

    public function __construct(){
        $this->detailRepository = new DetailRepository();
    }
    
    public function detail($type) {
        // get city limit
        $post = $this->detailRepository->getPostdetail($type);
        // get accommodation type list

        return view('Customer.detail_page', compact('post'));
    }
}
