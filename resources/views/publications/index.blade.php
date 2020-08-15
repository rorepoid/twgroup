@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Blog</h2>
    <hr>
    <div class="row d-flex flex-column justify-content-center align-items-center">
        {{ $publications->links() }}

        <div class="col-12 col-lg-9 mb-5">
            @forelse($publications as $publication)
                <div class="row mb-5">
                    <div class="col-9">
                    <a href="#" class="text-dark"><h1>{{ $publication->title }}</h1></a>
                    <a href="#"><span class="badge badge-info text-uppercase">{{ $publication->user->name }}</span></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium ipsum, similique debitis saepe soluta, vero provident ab atque fuga molestias magni repellat labore adipisci! Sapiente deleniti numquam minus adipisci reiciendis at, assumenda odit itaque tempore voluptas, repellat sequi ab quibusdam.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi rem quasi reiciendis, ut eligendi, facilis deleniti temporibus vero ipsum accusamus.</p>

                    <br>
                    <a href="#" class="btn btn-outline-dark btn-sm">Read full article</a>
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