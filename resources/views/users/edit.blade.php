<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="{{route('users.update', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>First Name:</label><br>
            <input type="text" name="first_name" value="{{$user->first_name}}" required>
        </p>
        <p>
            <label>Last Name:</label><br>
            <input type="text" name="last_name" value="{{$user->last_name}}" required>
        </p>
        <p>
            <label>Username:</label><br>
            <input type="text" name="username" value="{{$user->username}}" required>
        </p>
        <p>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{$user->email}}" required>
        </p>
        <p>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="********">
        </p>
        <p>
            <button type="submit">Update User</button>
            <a href="{{route('users.index')}}"><button type="button">Cancel</button></a>
        </p>
    </form>
</body>
</html>
