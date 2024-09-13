<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id" value="{{ old('user_id', $post->user_id) }}">
        </div>
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
        </div>
        <div>
            <label for="body">Body:</label>
            <textarea name="body" id="body">{{ old('body', $post->body) }}</textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
