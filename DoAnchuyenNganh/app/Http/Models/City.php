<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Post;

// Thành phố
class City extends Model
{
    protected $table = 'cities';

    protected $guarded = [];

    public function post()
    {
        return $this->hasMany(Post::class)->where('accommodation_status','đã duyệt');
    }
}
