<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
</head>
<body>
    <h1>Create New User</h1>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <p>
            <label>First Name:</label><br>
            <input type="text" name="first_name" required>
        </p>
        <p>
            <label>Last Name:</label><br>
            <input type="text" name="last_name" required>
        </p>
        <p>
            <label>Username:</label><br>
            <input type="text" name="username" required>
        </p>
        <p>
            <label>Email:</label><br>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </p>
        <p>
            <button type="submit">Create</button>
        </p>
    </form>
</body>
</html>
