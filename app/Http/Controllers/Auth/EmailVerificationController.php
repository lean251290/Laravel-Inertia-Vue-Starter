<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailVerificationController extends Controller
{
    public function notice()
    {
        $status = session('status');
        return Inertia::render('Auth/VerifyEmail', compact('status'));
    }


    public function handler(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home');
    }



    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Verification link sent!');
    }
}
