<?php

namespace App\Http\Controllers\Author;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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
        return view('author.tutor')->with('tutors',$tutors);
    }

   /**
     * Show the form for chnage prifile of user.
     *
     * @return \Illuminate\Http\Response    
     */

    public function changeProfilePicture(){

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

    public function profile(){
        return view('author.chnageProfile');
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
