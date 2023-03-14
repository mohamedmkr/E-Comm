<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function showHomeView()

    {
        return view('homeView');
    }
    public function showContactView()

    {
        return view('contactView');
    }
    public function showOurteamsView()

    {
        $teachers = Teacher::All();
        return view('ourteamsView', compact('teachers'));
    }
    public function showAboutView()

    {
        $teachers = Teacher::All();
        return view('aboutView', compact('teachers'));
    }
    public function showCoursesView()

    {
        return view('coursesView');
    }
    public function showLoginView()

    {
        return view('loginView');
    }

    public function login(Request $request)

    {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($user) && ($request->typeOfUser == 'student')) {
            $request->session()->regenerate();

            return view('homeView');
        } elseif (Auth::attempt($user) && ($request->typeOfUser == 'teacher')) {
            $request->session()->regenerate();

            return view('Dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegisterView()
    {
        return view('registerView');
    }

    public function register(Request $request)

    {
        $request->validate(
            [
                'email' => 'required|email|unique',
                'password' => 'required',
                'name' => 'required|string',
                'avatar_link' => 'required',
                'tpeOfUser' => 'required'
            ]
        );
        if ($request->typeOfUser == 'student') {
            $student = Student::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'avatar_link' => $request->avatar_link
                ]
            );
            if ($student) {
                return view('homeView');
            }
        } elseif ($request->typeOfUser == 'teacher') {
            $teacher = Teacher::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'avatar_link' => $request->avatar_link
                ]
            );
            if ($teacher) {
                return view('Dahboard');
            }
        }
    }
}
