<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

// Bài đăng cho thuê
class Post extends Model
{
    protected $table = 'posts';

    protected $guarded = [];

    public function Feedbacks()
    {
        return $this->hasMany(App\Http\Models\FeedBack::class);
    }

    public function ServicePosts()
    {
        return $this->hasMany(ServicePost::class, 'post_id', 'id');
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }

    public function accomodation_type()
    {
        return $this->belongsTo(AccommodationType::class, 'accommodation_type_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(App\Http\Models\User::class);
    }

    public function PostImgs()
    {
        return $this->hasMany(PostImg::class, 'post_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
