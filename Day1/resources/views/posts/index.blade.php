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
            <th scope="col">Slug</th>
            <th scope="col">Posted By</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td> {{ $post->id }} </td>
            <td> {{ $post->title }} </td>
            @if($post->slug)
            <td> {{ $post->slug }} </td>
            @endif
            @if($post->user)
            <td>{{$post->user->name}}</td>
            @else
            <td>Not Found</td>
            @endif
            <td> {{ $post->description }} </td>
            <td> {{ \Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }} </td>
            <td>
                <a href="{{ route('posts.show',['post'=>$post->id]) }}" class="btn btn-info">View</a>
                <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('posts.delete', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <!-- <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button> -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $posts->links() !!}
</div>
@endsection
