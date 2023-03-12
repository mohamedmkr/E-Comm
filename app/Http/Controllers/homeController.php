<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function showHomeView()
    {
        return view('homeView');
    }
    public function showContactView(){
        return view('contactView');
    }

    public function showOurTeamsView(){
        $teams=Team::all();
        return view('homeView',compact('teams'));
        
    }
    public function showCoursesView()
    {
        $courses=Course::all();
        return view('contactView',compact('courses'));
    }

      public function showOurTeamView(){
        $teams=Team::all();
        return view('homeView',compact('teams'));
        
    }
    public function showAboutView(){
        return view('abortView');
    }

    public function showLoginView()
    {
            if(Auth::id()){
                return view('loginView');
            }
            else
            {
          
              return view('registerView');

             }
    }
  
    public function register(Request $request)
    {
        $user=\request()->validate([
            'user-name'=>'required|max:255|min:3',
            'user-email'=>'required|email|max:255|unique:users,email',
            'user-password'=>'required|min:7|max:20',
        ]);
        User::create(['name'=>$user['user-name'],'email'=>$user['user-email'],'password'=>bcrypt($user['user-password'])
    ]);
        return redirect('/');
    }
      
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
