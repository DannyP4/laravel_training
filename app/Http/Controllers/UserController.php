<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::with('tasks')->get() // eager loading
        ]); // return all users

        // lazy Eager Loading
        // return view('users.index', [
        //     'users' => User::all()->load('tasks'),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // eloquent orm
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);

        // query builder
        // DB::table('users')->where('id', $user->id)->update([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'username' => $request->username,
        //     'email' => $request->email,
        // ]);

        // if the password is provided, hash it
        if ($request->password) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return redirect()->route('users.index');
    }

    /**
     * Show the delete form.
     */
    public function showDeleteForm(User $user)
    {
        return view('users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // manually handle transactions
        // // begin transaction
        // DB::beginTransaction();

        // try {
        //     // delete all tasks associated with the user
        //     $user->tasks()->delete();

        //     // delete the user
        //     $user->delete();

        //     // commit the transaction if successful
        //     DB::commit();

        //     return redirect()->route('users.index')->with('success', 'User deleted successfully!');
        // } catch (\Exception $e) {
        //     // rollback the transaction if there was an error
        //     DB::rollBack();

        //     return redirect()->route('users.index')->with('error', 'Failed to delete user: ' . $e->getMessage());
        // }

        // automatically handle transactions
        try {
            DB::transaction(function () use ($user) {
                // delete all tasks associated with the user
                $user->tasks()->delete();

                // and delete the user
                $user->delete();
            });

            return redirect()->route('users.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
}
