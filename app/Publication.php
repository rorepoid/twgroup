<?php

namespace App;

use App\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = ['title', 'content'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
