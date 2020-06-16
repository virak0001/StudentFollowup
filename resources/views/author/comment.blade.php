@extends('layouts.frontend.app')
@section('body')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 col-md-2"></div>
    <div class="col-sm-10 col-md-8">
      <h6>
        <img class="mx-auto d-block" src="{{asset('img_student/'.$students->picture)}}" width="100" style="border-radius: 100px;" height="100" alt="User" />
        <p class="text-center">{{$students['first_name']}}.{{$students['last_name']}}</p>
        <div class="card mt-1" style="border-radius:5px">
          <div class="card-header">
            @foreach ($students->comments as $comment)
            <div class="row">
              <div class="col-1">
                <img class="profile-image" src="{{asset('assets/img/'.$comment->user['profile'])}}" width="40" height="40" style="border-radius: 50%;" alt="User" />
              </div>
              <div class="col-11">
                <small class="ml-2">{{$comment->user['first_name']}}.{{$comment->user['last_name']}}</small><br>
                <p style="font-size:16px">

                  {{$comment->comment}}
                  @if (Auth::id() == $comment->user_id)
                  <a onclick="getValue({{$comment->id}})" style="cursor: pointer"><i class="material-icons text-primary" data-toggle="tooltip" data-placement="top" title="edit" style="font-size:10px">edit</i></a>
                  <a onclick="document.getElementById('delete').submit()" href="{{route('author.deleteComment',$comment->id)}}"><i class="material-icons text-primary" data-toggle="tooltip" data-placement="top" title="delete" style="font-size:10px">delete</i></a><br>
                  @endif

                </p>
              </div>
            </div>
            @endforeach
          </div>
          <div class="card-footer">
            <form id="inserComment" action="{{route('author.storeCommment',[$students->id, Auth::id()])}}" method="post">
              @csrf
              @method('PUT')
              <textarea name="comment" class="form-control" cols="52" rows="3" placeholder="Please write you comment"></textarea>
              <a href="#" id="send" onclick="document.getElementById('inserComment').submit()"><i class="material-icons" style="margin-top:3px;">send</i></a>
            </form>
            <form id="editForm" action="#" method="post">
              @csrf
              @method('PUT')
              <textarea id="editComment" name="comment" class="form-control" cols="52" rows="3" placeholder="Edit comment"></textarea>
              <a href="#" id="send" onclick="document.getElementById('editForm').submit()"><i class="material-icons" style="margin-top:3px;">send</i></a>
            </form>
          </div>
        </div>
      </h6>
    </div>
  </div>
</div>


<Script>
  function deleteComment(id) {

  }
  document.getElementById("editForm").hidden = true;

  function getValue(value) {
    document.getElementById("inserComment").hidden = true;
    document.getElementById("editForm").hidden = false;
    @foreach($students -> comments as $comment)
    var data = '{{$comment->id}}';
    if (data == value) {
      $('#editForm').attr('action', "{{route('author.editComment',[$comment->id])}}");
      document.getElementById("editComment").innerHTML = `{{$comment->comment}}`;
    }
    @endforeach
  }
</Script>


@endsection