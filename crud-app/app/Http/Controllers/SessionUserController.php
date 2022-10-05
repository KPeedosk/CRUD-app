<?php

namespace App\Http\Controllers;

use App\Models\User;

class SessionUserController extends Controller
{
    protected function getSessionUserOrRedirect()
    {
        $userId = session('userId');
        if ($userId == null) {
            return redirect('/');
        }
        return User::where('id', $userId)->first();
    }
}
