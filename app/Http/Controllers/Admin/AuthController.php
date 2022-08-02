<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin(Request $request)
    {
        if ($request->isMethod('GET')) {
            if (auth()->user()) {
                return redirect(route('admin.dashboard'));
            }

            return view('admin.auth.login');
        }

        if ($request->isMethod('POST')) {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->route('admin.dashboard');
            } else {
                return back()->with('error', 'your username and password are wrong.');
            }
        }
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect(url('admin/login'));
    }

    public function redirectToLogin()
    {
        return redirect(url('admin/login'));
    }
}
