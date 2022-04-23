<table class="table mt-4">

    @foreach ($post->comments as $comment)
    <tbody>
        <tr>
            @if($comment->user)
            <td> {{ $comment->user->name }} </td>
            @endif
            <td> {{ $comment->body }} </td>
            <td> {{ \Carbon\Carbon::parse($comment->created_at)->toDayDateTimeString() }} </td>
            <td>
                <a href=" {{ route('comments.edit',[$comment->id]) }}" class="btn btn-primary">Edit</a>
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