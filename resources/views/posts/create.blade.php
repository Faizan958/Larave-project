<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div>
            <label for="email">User ID:</label>
            <input type="text" name="user_id" id="user_id" required>
        </div>
        <div>
            <label for="email">Title:</label>
            <input type="text" name="title" id="email" required>
        </div>
        <div>
            <label for="Body">Body:</label>
            <textarea name="body" id="body"></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
