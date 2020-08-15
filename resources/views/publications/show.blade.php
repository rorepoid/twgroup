@extends('layouts.app')

@section('content')
<main role="main" class="container">
    <h1 class="mt-5">{{ $publication->title }}</h1>
    <p>Posted by <span class="text-primary">{{ $publication->user->name }}</span> - {{ \Carbon\Carbon::createFromTimeStamp(strtotime($publication->updated_at))->diffForHumans() }}</p>
    <p class="lead">{{ $publication->content }}</p>
</main>
@endsection