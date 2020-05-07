<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\Room;
use App\Http\Models\Post;
use App\Http\Models\Transaction;

class BookingRepository
{
    protected $room;
    protected $post;
    protected $transaction;

    public function __construct(){
        $this->room = new Room();
        $this->post = new Post();
        $this->transaction = new Transaction();
       
    }

    // Get room of this post
    public function getRoom($post_id)
    {
        return $this->room->where('post_id', $post_id)->get();
    }

    // Get post by post id
    public function getPostById($id)
    {
        return $this->post->where('id', $id)->with(['room', 'city'])->first();
    }

    // Get post by room id
    public function getPost($room_id)
    {
        return $this->room->where('id', $room_id)->with(['post', 'RoomType'])->first();
    }

    // Insert transaction
    public function insertTransaction(array $input_transaction)
    {
        $this->transaction->create($input_transaction);
    }

    // Get transaction by user id
    public function getTransactionById($user_id)
    {
        return $this->transaction->where('flag_delete', 0)
                                ->where('user_id', $user_id)
                                ->with(['post', 'room', 'post.city', 'room.RoomType'])
                                ->paginate(4);
    }

    // Cancel booking
    public function cancelTransaction($id)
    {
        $new = $this->transaction->where('flag_delete', 0)->where('id', $id)->first();

        $new->flag_delete = 1;

        $new->save();
    }

    // Get transaction by id
    public function getTransaction($id)
    {
        return $this->transaction->where('flag_delete', 0)
                                ->where('id', $id)
                                ->with(['post', 'room', 'post.city', 'room.RoomType', 'user'])
                                ->first();
    }

    // Get transaction by post id
    public function getTransactionByPostId($post_id)
    {
        return $this->transaction->where('flag_delete', 0)
                                ->where('post_id', $post_id)
                                ->with(['user', 'room', 'room.RoomType'])
                                ->paginate(4);
    }

    // Get room by room id
    public function getRoomById($room_id)
    {
        return $this->room->where('id', $room_id)->first();
    }

     // Edit transaction
     public function editTransaction(array $input_transaction, $id)
     {
         $new = $this->transaction->where('id', $id)->first();
         
         $new->update($input_transaction);
     }

     // Pay transaction
     public function changePay($tran_id)
     {
        $new = $this->transaction->where('id', $tran_id)->first();

        $new->update(['isPay'=>1]);
     }
}
