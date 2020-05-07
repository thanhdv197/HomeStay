<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\Post;

class DetailRepository
{
    protected $post_details;


    public function __construct(){
        $this->post_details = new Post();

    }
    
    // get city list for detail post 
    public function getPostdetail($type)
    {
        return $this->post_details->where('id',$type)
                                ->where('accommodation_status', 'đã duyệt')
                                ->with(['PostImgs', 'ServicePosts.service', 'room.RoomType'])
                                ->first();
    }

}
