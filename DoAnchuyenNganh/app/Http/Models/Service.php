<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Dịch vụ
class Service extends Model
{
    protected $table = 'services';

    protected $guarded = [];

    public function ServicePosts()
    {
        return $this->hasMany(App\Http\Models\ServicePost::class);
    }
}
