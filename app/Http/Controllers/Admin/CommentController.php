<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    // Create new data in table comment
    public function storeCommment(Request $request, $id_student, $tutor_id){
        $comment =new Comment;
        $student = Student::find($id_student);
        $to_email = User::all();
        $user = User::find($tutor_id);
        $user_email = User::all();

        if($request -> comment != null) {
        $comment = new Comment();
            $to_email = $user_email->pluck("email")->toArray();
            $data = array("application"=>"studentfollowup2020ag6@gmail.com","from"=>$user->email,"body"=>$request->comment,"email"=>$to_email,"subject"=>"Comment on ".$student->first_name.'.'.$student->last_name);
            Mail::send("emails.email",compact('data'),function($message) use($data,$user){
                $message->from($data['from'], $user->first_name.'.'.$user->last_name)
                ->to($data['email'])
                ->subject($data['subject']);
            }); 
        $comment -> student_id = $id_student;
        $comment -> user_id = $tutor_id;
        $comment -> comment = $request -> get('comment');
        $comment -> save();
        }
        return redirect()->back();
    }

   

    public function editComment(Request $request, $id_comment){

        $comment = Comment::find($id_comment);
        if(auth()->id() == $comment['user_id']){
            $comment->comment = $request ->get('comment');
            $comment -> save();
        }

        return back();
    }

    public function showComment($id){
        $students = Student::find($id);
        return view('admin.comment')->with('students',$students);
    }


    public function deleteComment($id){
        $comment = Comment::find($id);
        if(auth()->id() == $comment['user_id']){
            $comment -> delete();
        }
        return back();

    }

}

