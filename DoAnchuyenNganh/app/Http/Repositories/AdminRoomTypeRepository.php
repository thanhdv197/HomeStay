<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Http\Models\RoomType;


class AdminRoomTypeRepository
{
    protected $roomType;


    public function __construct(){
        $this->roomType = new RoomType();
    }

    public function getRoomType()
    {
        return $this->roomType->where('flag_delete', 0)->get();
    }

    public function addRoomType(array $input_room_type)
    {
        $this->roomType->create($input_room_type);
    }

    public function delete($id)
    {
        $roomtype = $this->roomType->where('id', $id)->first();

        $roomtype->update(['flag_delete'=>1]);
 
    }

    public function getRoomTypeById($id)
    {
        $roomtype = $this->roomType->where('id', $id)->first();

        return $roomtype;
    }

    public function editRoomType(array $input_room_type, $id)
    {
        $roomtype = $this->roomType->where('id', $id)->first();

        $roomtype->update($input_room_type);
    }

}
