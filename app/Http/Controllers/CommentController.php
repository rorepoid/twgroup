<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Publication;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Publication $publication)
    {
        $comment = auth()->user()->comments()->create([
            'content' => $request->content,
            'publication_id' => $publication->id,
            'status' => 'APROBADO',
        ]);

        $data = [
            'user' => auth()->user()->name,
            'comment' => $comment->content,
            'publication' => $publication->title,
            'publication_url' => route('publications.show', $publication),
        ];

        \Mail::send('emails.comment', $data, function ($message) {

            $message->from('rorepoid@example.com', 'rorepoid');

            $message->to('user@example.com')->subject('Notificación');

        });


        return redirect()->route('publications.show', $publication);
    }
}
