<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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

    public function show2(Request $request, int $id)
    {
        /** @var User $loggedUser */
        $loggedUser = $request->user();

        $userProfile = User::findOrFail($id);

        if ($loggedUser->can('view', $userProfile)) {
            return response()->json($userProfile);
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }

}
