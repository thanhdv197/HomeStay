<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Ảnh trong bài đăng
class PostImg extends Model
{
    protected $table = 'post_imgs';

    protected $guarded = [];

    public function Post()
    {
        return $this->belongsTo(App\Http\Models\Post::class);
    }
}
