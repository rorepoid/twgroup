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
        //
    }

    public function store(Request $request)
    {
        //
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
