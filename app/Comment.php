<?php

namespace App;

use App\Publication;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'status'];

    public function publication()
    {
        return $this->belongsTo(publication::class);
    }
}
