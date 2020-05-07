<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Dịch vụ trong bài đăng
class ServicePost extends Model
{
    protected $table = 'services_posts';

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function Post()
    {
        return $this->belongsTo(App\Http\Models\Post::class);
    }
}
