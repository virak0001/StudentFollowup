<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Stub;

class TutorController extends Controller
{
    public function __constructor(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $tutors = $user::all();
        return view('admin.tutor')->with('tutors',$tutors);
    }

    /**
     * Display a listing of the tutor.
     *
     * @return \Illuminate\Http\Response
     */

    public function showPageAddTutor($id){
        $user = new User();
        $student = Student::find($id);
        $tutors = $user::all();
        return view('admin.addTutorToStudent')->with(array('tutors'=>$tutors, 'student'=>$student));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for chnage prifile of user.
     *
     * @return \Illuminate\Http\Response    
     */
    
    public function changeImageTutor(){

        $auth = Auth::user();
        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/assets/img/'), $imageName);

        $auth -> profile = $imageName;

        $auth -> save();
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user -> delete();  
        return back();
    }

    public function profile(){
        return view('admin.chnageProfile');
    }

    public function changeTutorName(Request $request){
        $user = User::find(Auth::id());
        $user -> first_name = $request ->get('firstname');
        $user -> last_name = $request -> get('lastname');
        $user -> save();
        return back();
    }

    public function updatePosition(Request $request){
        $user = User::find(Auth::id());
        $user -> position = $request ->get('position');
        $user -> save();
        return back();
    }
    
    public function updateAddress(Request $request){
        $user = User::find(Auth::id());
        $user -> address = $request ->get('address');
        $user -> save();
        return back();
    }
}
