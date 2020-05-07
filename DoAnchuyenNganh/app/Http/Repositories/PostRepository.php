<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\Post;
use App\Http\Models\PostImg;
use App\Http\Models\City;
use App\Http\Models\AccommodationType;
use App\Http\Models\RoomType;
use App\Http\Models\Service;
use App\Http\Models\ServicePost;
use App\Http\Models\Room;
use Hash;

class PostRepository
{
    protected $post;
    protected $post_img;
    protected $city;
    protected $accommodation_type;
    protected $room_type;
    protected $service;
    protected $service_post;
    protected $room;

    public function __construct(){
        $this->post = new Post();
        $this->post_img = new PostImg();
        $this->city = new City();
        $this->accommodation_type = new AccommodationType();
        $this->room_type = new RoomType();
        $this->service = new Service();
        $this->service_post = new ServicePost();
        $this->room = new Room();
    }

    // Get list post 
    public function getPost($id)
    {
        return $post = $this->post->where('user_id', $id)
                        ->where('accommodation_status', 'đã duyệt')
                        ->with('city')
                        ->withCount('room')
                        ->paginate(4);
    }

    // Update delete status for this post
    public function updateDeletePost($id)
    {
        $update = $this->post->find($id);
        $update->accommodation_status = 'đã xóa';

        $update->save();
    }

    // Get city
    public function getCity()
    {
        return $this->city->where('flag_delete', 0)->get();
    }

    // Get accommodation types
    public function getAccommodationType()
    {
        return $this->accommodation_type->where('flag_delete', 0)->get();
    }

    // Get room type
    public function getRoomType()
    {
        return $this->room_type->where('flag_delete', 0)->get();
    }

    // Get service
    public function getService()
    {
        return $this->service->where('flag_delete', 0)->get();
    }

    // Insert new post
    public function insertPost(array $input_post, array $input_room1, array $input_room2 = null, array $input_room3, array $input_service = null, array $input_img = null)
    {
        // insert post
        $new = $this->post;
        $post_id = $new->create($input_post)->id;

        // insert rooms
        $this->room->create([
            'room_name'=>$input_room1['room_name'],
            'utilities'=>$input_room1['utilities'],
            'area'=>$input_room1['area'],
            'price'=>$input_room1['price'],
            'room_type_id'=>$input_room1['room_type_id'],
            'post_id'=>$post_id,
            'room_status'=>'trống',
        ]);

        if(!is_null($input_room2['room_name']))
        {
            $this->room->create([
                'room_name'=>$input_room2['room_name'],
                'utilities'=>$input_room2['utilities'],
                'area'=>$input_room2['area'],
                'price'=>$input_room2['price'],
                'room_type_id'=>$input_room2['room_type_id'],
                'post_id'=>$post_id,
                'room_status'=>'trống',
            ]);
        }

        if(!is_null($input_room3['room_name']))
        {
            $this->room->create([
                'room_name'=>$input_room3['room_name'],
                'utilities'=>$input_room3['utilities'],
                'area'=>$input_room3['area'],
                'price'=>$input_room3['price'],
                'room_type_id'=>$input_room3['room_type_id'],
                'post_id'=>$post_id,
                'room_status'=>'trống',
            ]);
        }

        // insert services
        if(!is_null($input_service))
        {
            foreach($input_service as $item)
            {
                $this->service_post->create([
                    'post_id'=>$post_id,
                    'service_id'=>$item
                ]);
            }
        }
        

        // insert post_img
        if(!is_null($input_img))
        {
            foreach($input_img as $item)
            {
                $this->post_img->create([
                    'post_id'=>$post_id,
                    'post_img_link'=>$item,
                ]);
            }
        }
    
    }

    // Get post information by id
    public function getPostById($post_id)
    {
        return $post = $this->post->where('id', $post_id)
                        ->with(['city', 'room', 'ServicePosts', 'PostImgs'])
                        ->withCount('room')
                        ->first();
    }

}
