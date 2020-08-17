<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Publication;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Publication $publication)
    {
        auth()->user()->comments()->create([
            'content' => $request->content,
            'publication_id' => $publication->id,
            'status' => 'APROBADO',
        ]);

        return redirect()->route('publications.show', $publication);
    }
}
