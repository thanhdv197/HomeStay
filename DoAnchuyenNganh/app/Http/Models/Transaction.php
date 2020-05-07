<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Giao dịch 
class Transaction extends Model
{
    protected $table = 'transactions';

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
