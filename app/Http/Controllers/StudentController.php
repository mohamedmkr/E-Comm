<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
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
        $courses=Course::with('teacher')->get();
        $teachers=Teacher::All();
        $comments=Comment::with('student')->get();

        return redirect()->route('home')->with('success', 'comment Added Successfully')
        ->with(['courses' => 'courses',
        'teachers' =>'teachers',
        'comments' =>'comment',
        ]) ;}


    public function registerInCourse($course_id){
        $id = Auth::id();
        $student = Student::where('id', $id);
        $student->course()->attach($course_id);

        $courses=Student::where('id', $id)->courses()->with('teacher')->get();

       return view('student.courses',compact('courses'));
    }

    public function showEnrolledCourses(){

        $id = Auth::id();
        $courses=Student::where('id', $id)->courses()->with('teacher')->get();
        return view('student.courses',compact('courses'));


    }

}
