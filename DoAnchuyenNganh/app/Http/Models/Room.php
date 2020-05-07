<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Thông tin phòng
class Room extends Model
{
    protected $table = 'rooms';

    protected $guarded = [];

    public function RoomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function Transaction()
    {
        return $this->hasMany(App\Http\Models\Transaction::class);
    }

    public function Promotion()
    {
        return $this->belongsTo(App\Http\Models\Promotion::class);
    }
}
