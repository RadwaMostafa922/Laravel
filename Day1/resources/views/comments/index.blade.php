@extends('posts.show')
@section(show-comments)
<table class="table mt-4">
    @foreach ($post->comments as $comment)
    <tbody>
        <tr>
            <th>{{ $comment->user->name }}</th>
            <td> {{ $comment->body }} </td>
            <td> {{ \Carbon\Carbon::parse($comment->created_at)->toDayDateTimeString() }} </td>
            <td>
                <a href=" {{ route('posts.edit',[$post->id]) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('comments.delete', $comment->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection