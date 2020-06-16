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
          <th class="th-sm">Action</th>
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
          <td>
            @if (Auth::id() != $tutors->id)
            <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="true" aria-hidden="true" data-target="#exampleModal{{$tutors->id}}" href="#"><i class="material-icons">delete</i></a>
            @else
            <strong>Your Own</strong>
            @endif
            <!-- Modal -->
            <div class="modal fade modal-open" id="exampleModal{{$tutors->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure want to delete?
                  </div>
                  <div class="modal-footer">
                    <form action="{{route('admin.tutor.destroy',[$tutors->id])}}" method="POST">
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

@endsection