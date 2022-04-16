@extends('layouts.master')

@section('title') Create @endsection

@section('content')
<form method="POST" action="{{ route('posts.update',['post'=>$post['id']])}}">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"> </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $post['title'] }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"> </label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post['created_at'] }}</textarea>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"></label>
        <select class="form-control">
            <option value="1">Ahmed</option>
            <option value="2">Mohamed</option>
        </select>
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection