Route::get('/test-user', function() {
    $user = \App\Models\User::create([
        'first_name' => 'Test',
        'last_name' => 'User',
        'username' => 'testuser',
        'email' => 'test@example.com',
        'password' => \Illuminate\Support\Facades\Hash::make('password123'),
    ]);

    return 'User created! Try login with: test@example.com / password123';
});
