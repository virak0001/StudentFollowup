<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

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
        return view('admin.dashboard')
                ->with(array(
                    'numbers_tutors'=>$numbers_tutors,
                    'numbers_student' => $number_student,
                    'gender' => $gender,
                    'students' => $students,
        ));
    }
}



