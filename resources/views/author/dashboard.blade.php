@extends('layouts.frontend.app')
@section('body')
<div class="container-fluid">
  <h4 class="page-title">Dashboard</h4>
  <div class="row">
    <div class="col-12">
      <div class="row d-flex justify-content-between">
        @foreach ($gender as $male)
        <p class="ml-3" style="margin-right:15px"><span class="badge badge-primary">Male {{$male['male']}}</span>&nbsp;<span class="badge badge-danger">Female {{$male['female']}}</span></p>
        @endforeach
      </div>
      <div class="col-12 text-center">
        @foreach ($numbers_student as $student)
        <h5 class="card-category">{{$student['title']}} <span class="badge badge-primary">{{$student['numberStudent']}}</span></h5>
        @endforeach
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table id="example" class="table table-striped" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Profile</th>
          <th class="th-sm">Name</th>
          <th class="th-sm">Class</th>
          <th class="th-sm">Gender</th>
          <th class="th-sm">Tutor_Name</th>
          <th class="th-sm">Status</th>
          <th class="th-sm">Student_ID</th>
          <th class="th-sm">Comment</th>

          <th class="th-sm">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
          <td>{{$student->first_name}}.{{$student->last_name}}</td>
          <td>{{$student->class}}</td>
          <td>{{$student->gender}}</td>
          <td class="text-center">

            @if ($student->user_id == null)
            <p>No</p>
            @else
            <p class="text-primary">{{$student->user['first_name']}}.{{$student->user['last_name']}}</p>
            @endif

          </td>
          <td>
            @if ($student->status == 0)
            <p class="text-primary" type="button">Achive</p>
            @else
            <p class="text-primary">Follow Up</p>
            @endif
          </td>
          <td>{{$student->student_id}}</td>
          @if ($student->user_id!=null)
          <td><a href="{{route('author.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a></td>
          @else
          <td class="text-primary" style="cursor:pointer"><span class="material-icons ">speaker_notes_off</span>Comment</td>
          @endif
          <td>
            <a data-toggle="modal" data-target="#basicExampleModal{{$student->id}}" href="{{route('admin.showSpecficStudent',$student->id)}}"><span class="material-icons">visibility</span></a>
            <!-- Modal -->
            <div class="modal fade" id="basicExampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="card-header p-4 ">
                      <div class="row d-flex justify-content-center">
                        <div class="container-image">
                          <img class="mx-auto d-block" src="{{asset('img_student/'.$student->picture)}}" width="105" style="border-radius: 105px;" height="105" alt="Avatar">
                        </div>
                      </div>
                      <hr>
                      <div class="row d-flex justify-content-between">
                        <p> <strong>First Name: </strong>{{$student['first_name']}} </p>
                        <p><strong>Last Name: </strong>{{$student['last_name']}}</p>
                      </div>
                      <div class="row d-flex justify-content-between">
                        <p><strong>ID_Student: </strong>{{$student['student_id']}}</p>
                        <p><strong>Class: </strong>{{$student['class']}}</p>
                      </div>
                      <div class="row d-flex justify-content-between">
                        <p><strong>Year: </strong>{{$student['year']}}</p>
                        <p><strong>Gender: </strong>{{$student['gender']}}</p>
                      </div>
                      <div class="row d-flex justify-content-between">
                        <p><strong>Province </strong>{{$student['province']}}</p>
                        <p><strong>Student_ID: </strong>{{$student['student_id']}}</p>
                      </div>
                      <div class="row d-flex justify-content-between">
                        @if ($student['status']==false)
                        <p class="text-primary"><strong>Status: </strong> Achive</p>
                        @else
                        <p class="text-primary"> <strong>Status: </strong> Follow Up</p>
                        @endif

                        @if ($student->user_id == null)
                        @if ($student->status == false)
                        <p><strong>Tutor Name: </strong><span class="badge badge-secondary">No</span></p>
                        @else
                        <p><strong>Tutor Name: </strong>No</p>
                        @endif
                        @else
                        <p class="text-primary"><strong>Tutor Nane: </strong><span class="badge badge-secondary">{{$student->user['first_name']}}.{{$student->user['last_name']}}</span></p>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th class="th-sm">Profile</th>
          <th class="th-sm">Name</th>
          <th class="th-sm">Class</th>
          <th class="th-sm">Gender</th>
          <th class="th-sm">Tutor_Name</th>
          <th class="th-sm">Status</th>
          <th class="th-sm">Student_ID</th>
          <th class="th-sm">Comment</th>
          <th class="th-sm">Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
  @endsection