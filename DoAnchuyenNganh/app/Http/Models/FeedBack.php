<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

//php artisan make:model Http/Models/FeedBack
// Phản hồi thắc mắc
class FeedBack extends Model
{
    protected $table = 'feedback';

    public function Post()
    {
        return $this->belongsTo(App\Http\Models\Post::class);
    }
}
