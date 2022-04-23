@extends('layouts.master')

@section('title') Create @endsection

@section('content')
<form method="POST" action="{{ route('posts.update',[$post->id])}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"><h2>Title</h2> </label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $post->title }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"> <h2>Description</h2></label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"></label>
        <select name="post_creator" class="form-control">
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection