@extends('layouts.frontend.app')
@section('body')
<div class="container-fluid">
  <h4 class="page-title">Dashboard</h4>
  <div class="row">
    <div class="col-12">
      <div class="row d-flex justify-content-between">
        <p class="ml-3" style="margin-right:15px"><span class="badge badge-primary">Male {{$gender['male']}}</span>&nbsp;<span class="badge badge-danger">Female {{$gender['female']}}</span></p>
      </div>
      <div class="col-12 text-center">
        <h5 class="card-category">{{$numbers_student['title']}} <span class="badge badge-primary">{{$numbers_student['numberStudent']}}</span></h5>
      </div>
    </div>
  </div>
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">FollowUp</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Achieve</a>
    </div>
  </nav>
  <br>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Profile</th>
              <th class="th-sm">Name</th>
              <td class="th-sm">Tutor</td>
              <th class="th-sm">Class</th>
              <th class="th-sm">Status</th>
              <th class="th-sm">Student_ID</th>
              <th class="th-sm">Comment</th>
              <th class="th-sm">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
            @if ($student->status == 1)
            <tr>
              <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
              <td>{{$student->first_name}}.{{$student->last_name}}</td>
              <td class="text-primary text-center">
                  @if ($student->user_id == null)
                  <p>No</p>
                  @else
                  <p class="text-primary">{{$student->user['first_name']}}.{{$student->user['last_name']}}</p>
                  @endif
              </td>
              <td>{{$student->class}}</td>
              <td class="text-primary">
                Follow Up
              </td>
              <td>{{$student->student_id}}</td>
              <td>
                <a href="{{route('author.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a>
              </td>
              <td>
                <a data-toggle="modal" data-target="#basicExampleModal{{$student->id}}" href="#"><span class="material-icons">visibility</span></a>
                <!-- Modal -->
                <div class="modal fade" id="basicExampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Detail</h5>
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
            @endif
            @endforeach
    
          </tbody>
          <tfoot>
            <tr>
              <th class="th-sm">Profile</th>
              <th class="th-sm">Name</th>
              <td class="th-sm">Tutor</td>
              <th class="th-sm">Class</th>
              <th class="th-sm">Status</th>
              <th class="th-sm">Student_ID</th>
              <th class="th-sm">Comment</th>
              <th class="th-sm">Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
      <div class="table-responsive">
        <table id="achieve" class="table table-striped" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Profile</th>
              <th class="th-sm">Name</th>
              <th class="th-sm">Tutor</th>
              <th class="th-sm">Class</th>
              <th class="th-sm">Status</th>
              <th class="th-sm">Student_ID</th>
              <th class="th-sm">Comment</th>
              <th class="th-sm">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
            @if ($student->status == 0)
            <tr>
              <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
              <td>{{$student->first_name}} {{$student->last_name}}</td>
              <td class="text-primary text-center">
                @if ($student->user_id == null)
                <p>No</p>
                @else
                <p class="text-primary">{{$student->user['first_name']}}.{{$student->user['last_name']}}</p>
                @endif
              </td>
              <td>{{$student->class}}</td>
              <td>
                @if ($student->status == 0)
                <p class="text-primary">Achive</p>
                @else
                <p class="text-primary">Follow Up</p>
                @endif
              </td>
              <td>{{$student->student_id}}</td>
              @if ($student->user_id!=null)
              <td><a href="{{route('admin.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a></td>
              @else
              <td class="text-info"><span class="material-icons ">comment</span>Comment</td>
              @endif
              <td>
                <a data-toggle="modal" data-target="#basicExampleModal{{$student->id}}" href="#" class="material-icons">visibility</span></a>
                <!-- Modal -->
                <div class="modal fade" id="basicExampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Detail</h5>
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
            @endif
            @endforeach
    
          </tbody>
          <tfoot>
            <tr>
              <th class="th-sm">Profile</th>
              <th class="th-sm">Name</th>
              <th class="th-sm">Tutor</th>
              <th class="th-sm">Class</th>
              <th class="th-sm">Status</th>
              <th class="th-sm">Student_ID</th>
              <th class="th-sm">Comment</th>
              <th class="th-sm">Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
  @endsection