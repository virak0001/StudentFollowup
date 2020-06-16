@extends('layouts.frontend.app')
@section('body')

<div class="container-fluid">
    <h3 class="text-center">Personal info</h3>

    <img data-toggle="modal" data-target="#myModal" class="mx-auto d-block" width="100" height="100" style="border-radius:100px; cursor:pointer" src="../assets/img/{{Auth::user()->profile}}" alt="user"><br>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Change profile image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="dropdown-item" action="{{route('author.changeImageTutor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row" style="margin-left:1px">
                            <input id="file" type="file" name="picture">
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="btnsubmit" class="btn mt-2 btn-primary btn-sm" type="submit">Update Profile</button>
                    <button type="button" class="btn mt-2 btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal -->
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <ul class="list-group">
                <li class="list-group-item" style="cursor:pointer">
                    <div class="row" data-toggle="collapse" data-target="#demo">
                        <div class="col-sm-4">
                            <small><strong>NAME</strong></small>
                        </div>
                        <div class="col-sm-8">
                            {{Auth::user()->first_name}}.{{Auth::user()->last_name}}
                        </div>
                    </div>
                    <div id="demo" class="collapse">
                        <form action="{{route('author.changeTutorName')}}" method="post">
                            @csrf
                            @method('PUT')
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">Firstname</span>
                                </div>
                                <input type="text" name="firstname" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{Auth::user()->first_name}}">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">Lastname</span>
                                </div>
                                <input type="text" name="lastname" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{Auth::user()->last_name}}">
                            </div>
                            <input type="submit" value="Update" class="btn btn-primary btn-sm">
                        </form>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4">
                            <small><strong>POSITION</strong></small>
                        </div>
                        <div class="col-sm-8">
                            <div class="md-form form-sm" id="position">
                                <div class="row">
                                    <div class="col-sm-10">
                                        {{Auth::user()->position}}
                                    </div>
                                    <div class="col-sm-1">
                                        <span id="edit-position" style="cursor:pointer" class="material-icons">edit</span>
                                    </div>
                                </div>
                            </div>
                            <!-- edit -->
                            <div id="edit-position-form" class="md-form form-sm">
                                <div class="row">
                                    <div class="col-9">
                                        <form id="update-position" action="{{route('author.updatePosition')}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="position" value="{{Auth::user()->position}}" class="form-control form-control-sm">
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <div class="row">
                                            <span onclick="document.getElementById('update-position').submit()" style="cursor:pointer" class="material-icons">done</span>
                                            <span id="cancel-edit" style="cursor:pointer" class="material-icons">clear</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end edit -->
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4">
                            <small><strong>ADDRESS</strong></small>
                        </div>
                        <div class="col-sm-8">
                            <div class="md-form form-sm" id="address">
                                <div class="row">
                                    <div class="col-sm-10">
                                        {{Auth::user()->address}}
                                    </div>
                                    <div class="col-sm-1">
                                        <span id="edit-address" style="cursor:pointer" class="material-icons">edit</span>
                                    </div>
                                </div>
                            </div>
                            <!-- edit -->
                            <div id="edit-address-form" class="md-form form-sm">
                                <div class="row">
                                    <div class="col-9">
                                        <form id="update-address" action="{{route('author.updateAddress')}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control form-control-sm">
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <div class="row">
                                            <span onclick="document.getElementById('address-address').submit()" style="cursor:pointer" class="material-icons">done</span>
                                            <span id="cancel-edit-address" style="cursor:pointer" class="material-icons">clear</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end edit -->
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4">
                            <small><strong>EMAIL</strong></small>
                        </div>
                        <div class="col-sm-8">
                            {{Auth::user()->email}}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>

@endsection