@extends('layouts.app')

@section('content')
    <div role="main" class="container">
        <h1 class="mt-5">Create new Publication</h1>
        <form action="{{ route('publications.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="content" name="content" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Enter the content" rows="15"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection