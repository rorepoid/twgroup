@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Blog</h2>
    <hr>
    <div class="row d-flex flex-column justify-content-center align-items-center">
        {{ $publications->links() }}

        <div class="col-12 col-lg-9 mb-5">
            @forelse($publications as $publication)
                <div class="row mb-5 card card-body rounded-lg border border-dark shadow">
                    <div class="col-12">
                        <a href="{{ route('publications.show', $publication) }}" class="text-dark text-decoration-none"><h1>{{ $publication->title }}</h1></a>
                        <span class="badge text-secondary text-uppercase user-select-none">
                            {{ $publication->user->name }} - {{ \Carbon\Carbon::createFromTimeStamp(strtotime($publication->updated_at))->diffForHumans() }}
                        </span>
                        <div class="text-break mt-3 ml-1">
                            <p style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"
                            >{{ $publication->title }}
                            </p>
                        </div>

                        <div class="d-flex ml-1">
                            <a href="{{ route('publications.show', $publication) }}" class="btn btn-outline-dark btn-sm mr-4">Read full article</a>
                            @auth
                                @if($publication->user->id == auth()->user()->id)
                                    <a href="{{ route('publications.edit', $publication) }}" class="btn btn-outline-success btn-sm mr-4">Edit</a>
                                    <form action="{{ route('publications.destroy', $publication) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

            @empty
                <h1>No publications yet</h1>
            @endforelse
        </div>

        {{ $publications->links() }}
    </div>
</div>
@endsection
