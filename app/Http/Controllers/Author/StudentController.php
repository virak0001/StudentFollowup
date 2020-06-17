<?php

namespace App\Http\Controllers\Author;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function unserMentor(){
        $students = Student::all()->where('user_id', Auth::id());
        $count_students = Student::all()->where('user_id', Auth::id())->count();
        return view('author.underMantorStudent')->with(array('students'=>$students,'count_students'=>$count_students));
    }
}
