@extends('layouts.app')

@section('content')
<main role="main" class="container">
    <h1 class="mt-5">{{ $publication->title }}</h1>
    <p>Posted by <span class="text-primary">{{ $publication->user->name }}</span> - {{ \Carbon\Carbon::createFromTimeStamp(strtotime($publication->updated_at))->diffForHumans() }}</p>
    <p class="lead">{{ $publication->content }}</p>
    <hr>
    @if($publication->isCommentedBy(auth()->user()))
        <form action="{{ route('comments.store', $publication) }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Submit your Comment" rows="5">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
    @forelse($publication->comments as $comment)
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->user->name }}</h5>
                <p class="card-text">{{ $comment->content }}</p>
            </div>
        </div>
    @empty
        <div class="card">
            <div class="card-header">
                <h4>There is not comments yet</h4>
            </div>
        </div>
    @endforelse
</main>
@endsection