<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
      public function showPostView(){

        return view('student.postComment');
    }


    public function createPost(Request $request)
    {
        $request->validate([
           'body' => 'required',
        ]);
        // Eloquent Model
        Comment::create($request->comment());
        return redirect()->route('home')->with('success', 'comment Added Successfully');}


    public function registerInCourse($course_id){
        $id = Auth::id();
        $student = Student::where('id', $id);
        $student->course()->attach($course_id);

       return view('student.courses');
    }

    public function showEnrolledCourses(){

        $id = Auth::id();
        $courses=Student::where('id', $id)->courses();
        return view('student.courses',compact('courses'));


    }

}
