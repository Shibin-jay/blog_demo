@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Admin Dashboard</h1>
@endsection

@section('content')
    <p>Welcome to your blog management panel.</p>

    <div class="d-flex gap-3">
        <a href="{{ route('articles.index') }}" class="btn m-2 btn-primary">Manage Articles</a>
        <a href="{{ route('categories.index') }}" class="btn m-2 btn-secondary">Manage Categories</a>
        <a href="{{ route('tags.index') }}" class="btn m-2 btn-info">Manage Tags</a>
    </div>
@endsection