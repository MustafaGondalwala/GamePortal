<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\ProfileUpdate;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function index()
    {
        $subjects = getAllSubjects();

        return view('student.index', compact('subjects'));
    }

    public function studentGoogleLogin()
    {
        Session::put('current_google_login', 'student');

        return Socialite::driver('google')->redirect();
    }

    public function studentLogout()
    {
        auth::guard('student')->logout();

        return redirect()->route('home.index');
    }

    public function profile()
    {
        return view('student.profile');
    }

    public function profileStore(ProfileUpdate $request)
    {
        $student = auth()->guard('student')->user()->with('detail')->first();
        try {
            Log::info('Student Profile Update', ['body' => $request->all()]);
            DB::beginTransaction();

            if ($request->name) {
                $student->name = $request->name;
            }

            $detail_data = Arr::except($request->validated(), ['name']);
            $student->detail->update($detail_data);
            DB::commit();

            return redirect()->route('student.profile')->with('message', 'Profile Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            Log::error('Student Profile Update Error', ['e' => $e->getMessage(), 'body' => $request->all()]);

            return back()->with('error', 'Error Occured');
        }
    }
}
