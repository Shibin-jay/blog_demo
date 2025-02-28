@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Tag</h1>
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Create Tag</button>
        </form>
    </div>
@endsection
