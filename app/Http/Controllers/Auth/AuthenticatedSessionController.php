<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

public function store(Request $request)
{
    $this->validateLogin($request);

    if (method_exists($this, 'hasTooManyLoginAttempts') &&
        $this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);

        return $this->sendLockoutResponse($request);
    }

    if ($this->attemptLogin($request)) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/');
        }
    }

    $this->incrementLoginAttempts($request);

    return $this->sendFailedLoginResponse($request);
}