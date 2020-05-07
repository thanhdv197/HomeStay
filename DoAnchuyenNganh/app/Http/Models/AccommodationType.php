<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Loại chỗ nghỉ
class AccommodationType extends Model
{
    protected $table = 'accommodation_types';

    protected $guarded = [];

    public function post()
    {
        return $this->hasMany(Post::class)->where('accommodation_status', 'đã duyệt');
    }
}
