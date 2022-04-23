@extends('layouts.master')

@section('title') Create @endsection

@section('content')
<form method="POST" action="{{ route('comments.update',[$comment->id])}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"> </label>
        <input name="body" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $comment->body }}">
    </div>
    <div class="mb-3">
        <select name="post_creator" class="form-control">
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection