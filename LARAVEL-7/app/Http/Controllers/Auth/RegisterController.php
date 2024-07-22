<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // $role = Role::findByName($request->role);
        // $user->assignRole($role);

        // auth()->login($user);

        // return redirect()->route('home');

        Auth::login($user);

        // Eager load posts relationship
        $user->load('posts');

        // Redirect based on role
        if ($user->hasRole('admin')) {
            return redirect()->route('posts.create');
        } elseif ($user->hasRole('editor')) {
            // Redirect to posts.index if no posts exist
            if ($user->posts->isEmpty()) {
                return redirect()->route('posts.index');
            }
            // Redirect to the edit page of the first post for simplicity
            return redirect()->route('posts.edit', ['post' => $user->posts->first()->id]);
        } else {
            return redirect()->route('posts.index');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'exists:roles,name'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Assign the role to the user
        $user->assignRole($data['role']);

        return $user;
    }
}
