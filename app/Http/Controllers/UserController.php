<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Filters\UsersFilter;

class UserController extends Controller
{
    public function __invoke(Request $request, UsersFilter $filters)
    {
        $users = User::with('info')->filter($filters)->get();

        return view('user.index', compact('users'));
    }
}
