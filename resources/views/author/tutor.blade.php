@extends('layouts.frontend.app')
@section('body')
<div class="container-fluid">
  <h3 class="text-center">List Of Tutor</h3>
  <div class="table-responsive">
    <table id="example" class="table table-striped" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">Profile</th>
          <th class="th-sm">Name</th>
          <th class="th-sm">position</th>
          <th class="th-sm">Email</th>
          <th class="th-sm">address</th>
          <!-- <th class="th-sm">Action</th> -->
        </tr>
      </thead>
      <tbody>
        @foreach ($tutors as $tutors)
        <tr>
          <td>
            <a href="#">
              <img class="profile-image" src="{{asset('assets/img/'.$tutors->profile)}}" width="40" height="40" style="border-radius: 50%;" alt="User" />
            </a>
          </td>
          <td>{{$tutors->first_name}}.{{$tutors->last_name}}</td>
          <td>{{$tutors->position}}</td>
          <td>{{$tutors->email}}</td>
          <td>{{$tutors->address}}</td>
          
        </tr>

        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th class="th-sm">Profile</th>
          <th class="th-sm">Name</th>
          <th class="th-sm">position</th>
          <th class="th-sm">Email</th>
          <th class="th-sm">address</th>
          <!-- <th class="th-sm">Action</th> -->
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endsection