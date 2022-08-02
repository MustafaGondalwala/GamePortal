<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Login With Tutor
     *
     * @param [type] $user
     * @return void
     */
    private function tutorLogin($user)
    {
        // Check Users Email If Already There
        $is_user = Tutor::where('email', $user->getEmail())->first();
        if (! $is_user) {
            Tutor::updateOrCreate([
                'google_id' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
            ]);
        } else {
            Tutor::where('email', $user->getEmail())->update([
                'google_id' => $user->getId(),
            ]);
        }
        $user = Tutor::where('email', $user->getEmail())->first();
        auth::guard('tutor')->loginUsingId($user->id);
    }

    /**
     * Login With Student
     *
     * @param [type] $user
     * @return void
     */
    private function studentLogin($user)
    {
        // Check Users Email If Already There
        $is_user = Student::where(['login_id' => $user->getEmail(), 'login_type_id' => 'google'])->exists();
        if (! $is_user) {
            $student = Student::create([
                'name' => $user->getName(),
                'login_id' => $user->getEmail(),
                'login_type_id' => 'google',
                'google_id' => $user->getId(),
            ]);
            $student->detail()->create();
        } else {
            Student::where(['login_id' => $user->getEmail(), 'login_type_id' => 'google'])->update([
                'google_id' => $user->getId(),
            ]);
        }
        $user = Student::where(['login_id' => $user->getEmail(), 'login_type_id' => 'google'])->first();
        auth::guard('student')->loginUsingId($user->id);
    }

    /**
     * Login the User by Google
     *
     * @return void
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $guard_type = Session::get('current_google_login');
            $user = Socialite::driver('google')->user();

            if ($guard_type == 'tutor') {
                Log::info('Google Login Tutor', ['body' => $request->all()]);
                $this->tutorLogin($user);

                return redirect()->route('tutor.dashboard');
            } elseif ($guard_type == 'student') {
                Log::info('Google Login Student', ['body' => $request->all()]);
                $this->studentLogin($user);
                Log::info('Google Login Success', ['user' => $user]);

                return redirect()->route('home.index');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::error('Google Login Error', ['body' => $e->getMessage()]);

            return redirect('/');
        }
    }
}
