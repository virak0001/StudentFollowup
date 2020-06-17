@extends('layouts.frontend.app')
@section('body')
<div class="container-fluid">
  <h5 class="page-title">Assign tutor to {{$student -> first_name}}.{{$student -> last_name}}&nbsp&nbsp;<img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></h5>
  <hr>
  <div class="card-body">
    <div class="table-responsive">
      <table id="example" class="table table-striped" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">
              Select Tutor
            </th>
            <th class="th-sm">Profile</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">position</th>
            <th class="th-sm">Email</th>
            <th class="th-sm">address</th>
            <th class="th-sm">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tutors as $tutor)
          <tr>
            <td>
              <form action="{{route('admin.addTutorToStudent',[$tutor->id,$student->id])}}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary btn-sm">Assing</button>
              </form>
            </td>
            <td>
              <a href="#">
                <img class="profile-image" src="{{asset('assets/img/'.$tutor->profile)}}" width="40" height="40" style="border-radius: 50%;" alt="User" />
              </a>
            </td>
            <td>{{$tutor->first_name}}.{{$tutor->last_name}}</td>
            <td>{{$tutor->position['name']}}</td>
            <td>{{$tutor->email}}</td>
            <td>{{$tutor->address}}</td>
            <td>
              @if (Auth::user()->email != $tutor->email)
              <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#exampleModal" href="#"><i class="material-icons">delete</i></a>
              @else
              <strong>Your Own</strong>
              @endif
              <!-- Modal -->
              <div class="modal fade modal-open" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <form method="POST" action="{{route('admin.tutor.destroy',$tutor->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                      </form>
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
            <th class="th-sm"></th>
            <th class="th-sm">Profile</th>
            <th class="th-sm">Name</th>
            <th class="th-sm">position</th>
            <th class="th-sm">Email</th>
            <th class="th-sm">address</th>
            <th class="th-sm">Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

@endsection