<?php

namespace App;

use App\Publication;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'status', 'publication_id', 'user_id'];

    public function publication()
    {
        return $this->belongsTo(publication::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
