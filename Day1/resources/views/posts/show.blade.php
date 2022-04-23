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
    <div class="text-center mb-4">
    <h4>Add comment</h4>
    </div>
    <div id="createcomment">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="mb-3">
                <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comment Creator</label>
                <select name="post_creator" class="form-control">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success">Done</button>
        </form>
    </div>
</div>
<div class="container">
    @include('comments.show')
</div>
@endsection