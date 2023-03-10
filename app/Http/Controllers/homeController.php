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
    public function showCoursesView()
    {
        $course=Course::all();
        return view('homeView',compact('courses'));
    }

      public function showOurTeamView(){
        $team=Team::all();
        return view('homeView',compact('team'));
        
    }
    

    public function showCategoriesView(){

      $category=Categories::withCount('Courses')->get();
        return view('homeView',compact('category'));
    }

    public function showTestimonialView(){
        
        $testimonial=testimonial::all();
        return view('homeView',compact('testimonial'));  
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
