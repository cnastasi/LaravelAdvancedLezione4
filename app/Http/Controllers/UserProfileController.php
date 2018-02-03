<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserProfileController extends Controller
{
    public function me()
    {
        $user = Auth::user();

        return view('profile', ['user' => $user]);
    }

    public function show(int $userId)
    {
        if (Gate::denies('show-profile', $userId)) {
            abort(403, 'Unauthorized action');
        }

        $user = User::findOrFail($userId);

        return view('profile', ['user' => $user]);
    }
}
