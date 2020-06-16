<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Student;


class DashboardController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }
    
    public function index(){
        $numbers_tutors = [
            [
                'title' => 'Tutors',
                'numberOfTutors' => User::all()->count(),
            ],
        ];
        $number_student = [
            [
                'title' => 'Total Students',
                'numberStudent' => Student::all()->count(),
            ],
        ];
        
        $gender = [
            [
                'male' => Student::all()->where('gender', 'Male')->count(),
                'female' => Student::all()->where('gender', 'Female')->count(), 
            ]
        ];
        $students = Student::all();
        return view('author.dashboard')
                ->with(array(
                    'numbers_tutors'=>$numbers_tutors,
                    'numbers_student' => $number_student,
                    'gender' => $gender,
                    'students' => $students,
        ));
    }
}
