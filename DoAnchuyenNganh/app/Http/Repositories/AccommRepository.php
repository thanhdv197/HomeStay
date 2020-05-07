<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\Post;


class AccommRepository
{
    protected $accomm;


    public function __construct(){
        $this->accomm = new Post();
    }
    
    // get city list for index page
    public function getAccomlist($type)
    {
        return $this->accomm->where('accommodation_type_id',$type)
                            ->where('accommodation_status', 'đã duyệt')
                            ->with(['city', 'room', 'room.RoomType'])
                            ->paginate(4);
    }

    // get accommodation type list for index page
}
