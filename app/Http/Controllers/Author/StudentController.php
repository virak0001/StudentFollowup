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

    public function followUpStudent()
    {
        $students = Student::all();

        $number_student_follow_up = [
            [
                'title' => 'Follow Up',
                'numberStudentFollowUp' => Student::all()->where('status', 1)->count(),
            ],
        ];
        return view('author.followUpStudent')->with(array('students'=>$students, 'number_student_follow_up'=>$number_student_follow_up));
    }

    public function achiveStudent(){

        $students = Student::all();

        $number_student_achive = [
            [
                'title' => 'Achive List',
                'numberStudentAchive' => Student::all()->where('status', 0)->count(),
            ],
        ];

        return view('author.AchiveStudent')->with(array('students'=>$students,'number_student_achive'=>$number_student_achive));
            
    }

    public function unserMentor(){
        $students = Student::all()->where('user_id', Auth::id());
        $count_students = Student::all()->where('user_id', Auth::id())->count();
        return view('author.underMantorStudent')->with(array('students'=>$students,'count_students'=>$count_students));
    }
}
