<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Khuyến mãi
class Promotion extends Model
{
    protected $table = 'promotion';

    public function Rooms()
    {
        return $this->hasMany(App\Http\Models\Room::class);
    }
}
