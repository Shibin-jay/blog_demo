@extends('layouts.frontend')

@section('title', $article->title)

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="{{ $article->title }}">
        <p>{{ $article->description }}</p>
        <p><strong>Category:</strong> {{ $article->category->name }}</p>
        <p><strong>Tags:</strong> 
            @foreach($article->tags as $tag)
                <span class="badge bg-secondary">{{ $tag->name }}</span>
            @endforeach
        </p>
    </div>
@endsection
