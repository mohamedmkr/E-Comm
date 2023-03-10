<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;


class StudentController extends Controller
{
      public function showPostView(){
        return view('student.postCommentView');
    }


    public function createPost(Request $request)
    {
        $request->validate([
           'body' => 'required',
        ]);
        // Eloquent Model
        Comment::create($request->comment());
        return redirect()->route('home.Homeview')->with('success', 'comment Added Successfully');}


    public function registerInCourse($course_id){

       return view('student.CoursesView', [
            'course' =>Course::findOrFail($course_id)
        ]);
    }

    public function showEnrolledCourses(){
        return view('student.CoursesView');


    }

}
