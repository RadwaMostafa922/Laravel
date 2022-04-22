@extends('layouts.master')

@section('title') Index @endsection

@section('content')
<div class="text-center">
    <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> {{ $post->id }} </td>
            <td> {{ $post->title }} </td>
            <td> {{ $post->user->name }} </td>
            <td> {{ $post->description }} </td>
            <td> {{ \Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }} </td>
            <td>
                <a href=" {{ route('posts.edit',[$post->id]) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('posts.delete', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<div class="container">
    @yield('comment-form')
</div>
<div class="container">
    @yield('show-comments')
</div>
@endsection