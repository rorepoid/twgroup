<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = ['title', 'content'];
}
