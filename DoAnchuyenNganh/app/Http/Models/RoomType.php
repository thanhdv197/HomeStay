<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Thông tin loại phòng
class RoomType extends Model
{
    protected $table = 'room_types';

    protected $guarded = [];

    public function Rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id', 'id');
    }
}
