@extends('layouts.frontend.app')
@section('body')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2 col-md-2"></div>
    <div class="col-sm-8 col-md-8">
      <h4 class="page-title text-center">Edit Student Information</h4>
      <form action="{{route('admin.student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row" style="margin-top:-10px">
          <div class="col form-group">
            <label>First name </label>
            <input type="text" value="{{$student->first_name}}" class="form-control" name="first_name" required>
          </div> <!-- form-group end.// -->
          <div class="col form-group">
            <label>Last name</label>
            <input type="text" value="{{$student->last_name}}" class="form-control" name="last_name" required>
          </div> <!-- form-group end.// -->
        </div> <!-- form-row end.// -->
        <div class="form-row" style="margin-top:-10px">
          <div class="form-group col-md-6">
            <label>Class</label>
            <input type="text" value="{{$student->class}}" class="form-control" name="class" required>
          </div> <!-- form-group end.// -->
          <div class="form-group col-md-6">
            <label>Student_ID</label>
            <input type="text" value="{{$student->student_id}}" class="form-control" name="student_id" required>
          </div> <!-- form-group end.// -->
        </div> <!-- form-row.// -->
        <div class="form-row" style="margin-top:-10px">
          <div class="form-group col-md-6">
            <div class="form-group">
              <label for="gender">Gender</label><br>
              @if ($student->gender == 'Female')
              <label class="form-radio-label ml-3">
                <input class="form-radio-input" checked type="radio" name="gender" value="Female">
                <span class="form-radio-sign">Female</span>
              </label>
              <label class="form-radio-label ml-3">
                <input class="form-radio-input" type="radio" name="gender" value="Male">
                <span class="form-radio-sign">Male</span>
              </label>
              @else
              <label class="form-radio-label ml-3">
                <input class="form-radio-input" checked type="radio" name="gender" value="Female">
                <span class="form-radio-sign">Female</span>
              </label>
              <label class="form-radio-label ml-3">
                <input class="form-radio-input" checked type="radio" name="gender" value="Male">
                <span class="form-radio-sign">Male</span>
              </label>
              @endif
            </div> <!-- form-group end.// -->
          </div>
          <div class="form-group col-md-6">
            <div class="form-group">
              <label for="year">Year</label>
              <input class="form-control" value="{{$student->year}}" type="number" name="year" required>
            </div> <!-- form-group end.// -->
          </div>
        </div>
        <div class="form-group" style="margin-top:-25px">
          <label for="province">Province</label>
          <input class="form-control" type="text" value="{{$student->province}}" name="province" required>
        </div> <!-- form-group end.// -->
        <div class="form-group">
          <button type="submit" class="btn btn-primary"> Update </button>
          <a class="btn btn-danger float-right" href="">Cancel</a>
        </div> <!-- form-group// -->
        <small class="text-muted">By clicking the 'Create' button, your application will create a new student</small>
      </form>
    </div>
    <div class="col-sm-2 col-md-2"></div>
  </div>
</div>

@endsection