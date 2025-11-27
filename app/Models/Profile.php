<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'description',
        'phone',
        'address',
        'login',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(ProfilePostLike::class);
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'profile_post_likes')
            ->withTimestamps();
    }
}
