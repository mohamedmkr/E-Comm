<?php

namespace App\Http\Controllers;

use App\Models\Categorey;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
        {
            $courses = Course::where('teacher_id' , Auth::user()->id)->with('category')->withcount('student')->get();

            return view('courses.index' , compact('courses'));
        }
    public function showAddCourseView()
        {
            $categories = Categorey::all();

            return view('courses.addCourse' , compact('categories'));
        }
    public function showEditCourseView()
        {
            $categories = Categorey::all();
            return view('courses.editCourse' , compact('categories'));
        }   
    public function addCourse(Request $request)
        {
            $request->validate([
            'title'=>'required|max:500',
            'description'=>'required',
            'price'=>'required|integer',
            'img_url'=>'required|mimes:jpeg,jpg,png',
            'category_id'=>'required',
            'teacher_id'=>'required'
            ],[
                 'title.required'=> 'please enter tilte' ,
                 'description.required'=> 'please enter description' ,
                 'price.required'=> 'please enter price only number' ,
                 'img_url.required'=> 'please add image with jpeg , jpg , png' ,
                 'category_id.required'=> 'please select category' ,
                 'teacher_id.required'=> 'please select teacher' ,

            ]);
            $course = new Course();
            $course ->title = $request->input('title') ; 
            $course ->description = $request->input('description') ;
            $course ->category_id = $request->input('category_id') ; 
            $course ->teacher_id = $request->input('teacher_id') ; 
            $course ->price = $request->input('price') ; 
            if($request->hasfile('img_url'))
            {
              $file = $request->file('img_url');
              $extention = $file ->getClientOriginalExtension();
              $filename = time().'.'.$extention;
              $file->move('imgs/courses/' , $filename);
              $course->img_url = $filename ;
            }
            $course->save();
            $courses = Course::where('teacher_id' , Auth::user()->id)->with('category')->withcount('student')->get();

            return redirect()->route('courses.index' , compact('courses'));
        }   
    public function editCourse(Request $request , $id)
        {
           
            $course = Course::find($id);
            $course ->title = $request->input('title') ; 
            $course ->description = $request->input('description') ;
            $course ->category_id = $request->input('category_id') ; 
            $course ->teacher_id = $request->input('teacher_id') ; 
            $course ->price = $request->input('price') ; 
            if($request->hasfile('img_url'))
            {
              $file = $request->file('img_url');
              $extention = $file ->getClientOriginalExtension();
              $filename = time().'.'.$extention;
              $file->move('imgs/courses/' , $filename);
              $course->img_url = $filename ;
            }
            $course->update();
            $courses = Course::where('teacher_id' , Auth::user()->id)->with('category')->withcount('student')->get();

            return redirect()->route('courses.index' , compact('courses'));
        } 
    public function removeCourse(Request $request)
    {
       
         Course::findOrFail($request->id )->delete();
        $courses = Course::where('teacher_id' , Auth::user()->id)->with('category')->withcount('student')->get();

        return redirect()->route('courses.index' , compact('courses'));
    }
  
}
