<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\Post;


class AdminPostRepository
{
    protected $post;


    public function __construct(){
        $this->post = new Post();
    }

    public function getPost()
    {
        return $this->post->with(['accomodation_type', 'city'])->where('flag_delete', 0)->get();
    }

    public function delete($id)
    {
        $obj = $this->post->where('id', $id)->first();

        $obj->flag_delete = 1;
        $obj->save();
    }

    public function review($id)
    {
        $obj = $this->post->where('id', $id)->first();

        $obj->accommodation_status = 'đã duyệt';
        $obj->save();
    }

}
