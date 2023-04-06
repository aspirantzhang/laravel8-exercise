<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store()
    {
        // ddd(request()->all());
        $data = request()->validate([
            'name' => ['required', 'min:1', 'max:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:20'],
        ]);

        User::create($data);
    }
}
