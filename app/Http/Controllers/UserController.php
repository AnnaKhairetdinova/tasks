<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    public function show($uuid)
    {
        $user = User::findOrFail($uuid);
        return view('user.show', compact('user'));
    }
}
