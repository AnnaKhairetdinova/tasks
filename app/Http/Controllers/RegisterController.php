<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        $user = new User();
        return view('register.create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'first_name' => 'required|between:2,300',
            'second_name' => 'required|between:2,300',
            'email' => 'required|unique:users|between:10,300',
            'password' => 'required|between:10,20'
        ]);

        $user = new User();
        $user->fill($data);
        $user->save();

        return redirect()
            ->route('index');
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function show($uuid)
    {
        $user = User::findOrFail($uuid);
        return view('user.show', compact('user'));
    }
}
