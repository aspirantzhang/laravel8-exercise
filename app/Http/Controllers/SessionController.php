<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function store()
    {
        $data = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            return redirect('/posts')->with('success', 'Welcome back!');
        }

        // throw ValidationException::withMessages(['email' => 'Your provided credentials cannot be verified.']);
        return back()->withInput()->withErrors(['email' => 'Your provided credentials cannot be verified.']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts')->with('success', 'Goodbye!');
    }
}
