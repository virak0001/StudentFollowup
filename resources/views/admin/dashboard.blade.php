@extends('layouts.frontend.app')
@section('body')
  <div class="container-fluid">
    <h4 class="page-title">Dashboard</h4>
    <div class="row">
      <div class="col-12">
        <div class="row d-flex justify-content-between">
          <a href="{{route('admin.showAddStudent')}}"><i class="material-icons ml-5" style="margin-top:-5px; font-size:50px">add_circle</i></a>
          <p style="margin-right:15px"><span class="badge badge-primary">Male {{$gender['male']}}</span>&nbsp;<span class="badge badge-danger">Female {{$gender['female']}}</span></p>
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
                <th class="th-sm">Class</th>
                <th class="th-sm">Gender</th>
                <td class="th-sm">Tutor</td>
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
                <td>{{$student->class}}</td>
                <td>{{$student->gender}}</td>
                <td class="text-center">
    
                  @if ($student->user_id == null)
                  @if ($student->status == false)
                  <a style="cursor:pointer">
                    <span class="material-icons">add_circle</span>
                  </a>
                  @else
                  <a href="{{route('admin.showPageAddTutor',$student->id)}}" type="button">
                    <span class="material-icons">add_circle</span>
                  </a>
                  @endif
                  @else
                  <p class="text-primary">{{$student->user['first_name']}}.{{$student->user['last_name']}}</p>
                  @endif
    
                </td>
                <td>
                  @if ($student->status == 0)
                  <div class="dropdown">
                    <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Achive</a>
                    <ul class="dropdown-menu">
                      <form type="submit" method="POST" action="{{ route('admin.statusAchive',$student['id']) }}">
                        @csrf
                        @method('PUT')
                        <span><button class="btn" style="cursor:pointer">Follow Up</button></span>
                      </form>
                    </ul>
                  </div>
                  @else
                  <div class="dropdown">
                    <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Follow Up</a>
                    <ul class="dropdown-menu">
                      <form id="submit" method="POST" action="{{ route('admin.statusFollowUp',$student['id']) }}">
                        @csrf
                        @method('PUT')
                        <span><button class="btn" style="cursor:pointer">Achive</button></span>
                      </form>
                    </ul>
                  </div>
                  @endif
                </td>
                <td>{{$student->student_id}}</td>
                @if ($student->user_id!=null)
                <td><a href="{{route('admin.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a></td>
                @else
                <td class="text-info"><span class="material-icons ">comment</span>Comment</td>
                @endif
                <td>
                  <a href="{{route('admin.edit',$student->id)}}"><span class="material-icons">edit</span></a>
                  <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#exampleModal{{$student->id}}" href="#"><i class="material-icons">delete</i></a>
                  <!-- Modal -->
                  <div class="modal fade modal-open" id="exampleModal{{$student->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure want to delelte?
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="{{route('admin.student.destroy',$student->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a data-toggle="modal" data-target="#basicExampleModal{{$student->id}}" href=""><span class="material-icons">visibility</span></a>
                  <!-- Modal -->
                  <div class="modal fade" id="basicExampleModal{{$student->id}}" tabindex="-1" data-backdrop="true" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="overlay"><a href="" data-toggle="modal" data-target="#view{{$student->id}}"><span class="material-icons text-light">add_a_photo</span></a></div>
                                <!-- Modal -->
                                <div class="modal fade" id="view{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="view{{$student->id}}" aria-hidden="true">
                                  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Please picture</h5>
                                        </button>
                                      </div>
                                      <form action="{{route('admin.changePictureStudent',$student->id)}}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          @csrf
                                          @method('PUT')
                                          <input type="file" name="picture">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
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
                <th class="th-sm">Class</th>
                <th class="th-sm">Gender</th>
                <td class="th-sm">Tutor</td>
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
                <th class="th-sm">Class</th>
                <th class="th-sm">Gender</th>
                <th class="th-sm">Tutor</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Student_ID</th>
                <th class="th-sm">Provinc</th>
                <th class="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
              @if ($student->status == 0)
              <tr>
                <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                <td>{{$student->first_name}}.{{$student->last_name}}</td>
                <td>{{$student->class}}</td>
                <td>{{$student->gender}}</td>
                <td class="text-center">
    
                  @if ($student->user_id == null)
                  @if ($student->status == false)
                  <a style="cursor:pointer">
                    <span class="material-icons">add_circle</span>
                  </a>
                  @else
                  <a href="{{route('admin.showPageAddTutor',$student->id)}}" type="button">
                    <span class="material-icons">add_circle</span>
                  </a>
                  @endif
                  @else
                  <p class="text-primary">{{$student->user['first_name']}}.{{$student->user['last_name']}}</p>
                  @endif
    
                </td>
                <td>
                  @if ($student->status == 0)
                  <div class="dropdown">
                    <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Achive</a>
                    <ul class="dropdown-menu">
                      <form type="submit" method="POST" action="{{ route('admin.statusAchive',$student['id']) }}">
                        @csrf
                        @method('PUT')
                        <span><button class="btn" style="cursor:pointer">Follow Up</button></span>
                      </form>
                    </ul>
                  </div>
                  @else
                  <div class="dropdown">
                    <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Follow Up</a>
                    <ul class="dropdown-menu">
                      <form id="submit" method="POST" action="{{ route('admin.statusFollowUp',$student['id']) }}">
                        @csrf
                        @method('PUT')
                        <span><button class="btn" style="cursor:pointer">Achive</button></span>
                      </form>
                    </ul>
                  </div>
                  @endif
                </td>
                <td>{{$student->student_id}}</td>
                @if ($student->user_id!=null)
                <td><a href="{{route('admin.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a></td>
                @else
                <td class="text-info"><span aria-disabled="true" class="material-icons ">comment</span>comment</td>
                @endif
                <td>
                  <a href="{{route('admin.edit',$student->id)}}"><span class="material-icons">edit</span></a>
                  <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#exampleModal{{$student->id}}" href="#"><i class="material-icons">delete</i></a>
                  <!-- Modal -->
                  <div class="modal fade modal-open" id="exampleModal{{$student->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure want to delelte?
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="{{route('admin.student.destroy',$student->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a data-toggle="modal" data-target="#basicExampleModal{{$student->id}}"><span class="material-icons text-primary" style="cursor: pointer;">visibility</span></a>
                  <!-- Modal -->
                  <div class="modal fade" id="basicExampleModal{{$student->id}}" tabindex="-1" data-backdrop="true" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="overlay"><a href="" data-toggle="modal" data-target="#view{{$student->id}}"><span class="material-icons text-light">add_a_photo</span></a></div>
                                <!-- Modal -->
                                <div class="modal fade" id="view{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="view{{$student->id}}" aria-hidden="true">
                                  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Please picture</h5>
                                        </button>
                                      </div>
                                      <form action="{{route('admin.changePictureStudent',$student->id)}}" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          @csrf
                                          @method('PUT')
                                          <input type="file" name="picture">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
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
                <th class="th-sm">Class</th>
                <th class="th-sm">Gender</th>
                <th class="th-sm">Tutor</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Student_ID</th>
                <th class="th-sm">Provinc</th>
                <th class="th-sm">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection