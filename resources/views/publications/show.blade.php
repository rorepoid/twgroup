@extends('layouts.app')

@section('content')
    <main role="main" class="container bg-white rounded-lg px-lg-5">
        <h1 class="font-weight-bold py-3">{{ $publication->title }}</h1>
        <p>Posted by <span class="text-primary">{{ $publication->user->name }}</span>
            - {{ \Carbon\Carbon::createFromTimeStamp(strtotime($publication->updated_at))->diffForHumans() }}</p>
        <p class="h4">{{ $publication->content }}</p>
        @if(!$publication->isCommentedBy(auth()->user()))
            <form action="{{ route('comments.store', $publication) }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <div class="input-group mb-3">
                        <input type="text" name="content" class="form-control @error('content') is-invalid @enderror"
                               id="content" placeholder="Submit your Comment" rows="5">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
        @forelse($publication->comments as $comment)
            <div class="card mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Discussion</h4>
                    </div>
                </div>
                <div class="bg-white rounded-lg border-secondary">
                    <h5 class="card-title">{{ $comment->user->name }}</h5>
                    <p class="card-text">{{ $comment->content }}</p>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-header">
                    <h4>Be the first to comment</h4>
                </div>
            </div>
        @endforelse
    </main>
@endsection
