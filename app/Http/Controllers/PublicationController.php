<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        return view('publications.index', ['publications' => Publication::orderBy('updated_at', 'desc')->paginate(10)]);
    }

    public function create()
    {
        return view('publications.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        auth()->user()->publications()->create($validatedData);

        return redirect()->action('PublicationController@index');
    }

    public function show(Publication $publication)
    {
        return view('publications.show', compact('publication'));
    }

    public function edit(Publication $publication)
    {
        //
    }

    public function update(Request $request, Publication $publication)
    {
        //
    }

    public function destroy(Publication $publication)
    {
        //
    }
}
