<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function __invoke(Request $request)
    {
        $users = User::with('info');

        if ($request->has('name')) {
            $users->where('name', 'like', "%$request->name%");
        }

        if ($request->has('email')) {
            $users->where('email', 'like', "%$request->email%");
        }

        if ($request->has('is_active')) {
            $users->where('is_active', "$request->is_active");
        }

        if ($request->has('gender') && $request->gender) {
            $users->where('gender', "$request->gender");
        }

        if ($request->has('birthday')) {
            $users->whereHas('info', function (Builder $query) use ($request) {
                $query->where('birthday', 'like', "%$request->birthday%");
            });
        }

        $users = $users->paginate(20);

        return view('user.index', compact('users'));
    }
}
