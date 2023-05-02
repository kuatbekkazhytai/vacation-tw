<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(User $user)
    {
        if ($user->isEmployer()) {
            abort(403, 'Forbidden');
        }
        $user->load('vacation');

        return view('users.show', compact('user'));
    }
}
