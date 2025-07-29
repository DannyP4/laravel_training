<!DOCTYPE html>
<html>
<head>
    <title>Delete</title>
</head>
<body>
    <h1>Delete User: {{$user->username}}</h1>
    <form action="{{route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">
            Delete User
        </button>
    </form>
    <a href="{{route('users.index')}}"><button type="button">Cancel</button></a>
</body>
</html>
