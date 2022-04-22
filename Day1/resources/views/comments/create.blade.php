@extends('posts.show')
@section('comment-form')
<div class="text-center">
    <button class="btn btn-success" id="addcomment">Add Comment</button>
</div>
<div id="createcomment">
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <div class="mb-3">
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
@endsection