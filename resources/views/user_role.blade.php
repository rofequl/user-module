<?php
/**
 * Created by PhpStorm.
 * User: Omar Faruq
 * Date: 11-Nov-18
 * Time: 2:10 PM
 */
?>
@extends('layout.app')
@section('content')
        <!--- userrole Start --->

<div class="container-fluid p-2 pt-4">

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
        </div>
        @endif
                <!--- userrole All Alert End --->

        <div class="float-left">
            <h3>User Role Management</h3>
        </div>
        <div class="float-right mt-1">
            Home > User Role
        </div>
        <button class="btn btn-primary clearfix float-right  my-2" data-toggle="collapse" data-target="#demo">
            <i class="fas fa-plus"></i> User Role
        </button>

        <!--- Collapse Add userrole form Start --->
        <div id="demo" class="collapse clearfix">
            <div class="card welcome-wrapper shadow-reset">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" class="form-inline" action="{{ route('user_roleStore') }}" method="post">
                                {{ csrf_field() }}

                                <label class="mr-sm-2" for="user_role">User Role</label>
                                <input class="form-control" id="user_role" name="user_role" required>
                                &nbsp; &nbsp;<button type="submit" class="btn btn-success">Add User Role</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- Collapse Add userrole form End --->

        <!--- Update userrole form Start --->
        @if(isset($user_roleUpdate))
            <div id="demo" class="clearfix">
                <div class="card panel-default welcome-wrapper shadow-reset">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="{{ url('user_roleUpdate/'.$user_roleUpdate->id)}}"
                                      method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="user_role">User Role</label>
                                        <input class="form-control" value="{{$user_roleUpdate->user_role}}"  name="user_role" id="user_role" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update User Role</button>
                                    <a href="{{route('user_role')}}" class="btn btn-warning">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    <!--- Update userrole form End --->
            <!--- userrole View table Start --->
            <div class="card clearfix welcome-wrapper shadow-reset mt-4">
                <div class="card-body table-responsive">
                    <table id="example" class="table table-bordered table-dark welcome-wrapper">
                       <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Role</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $listNum = 1; ?>
                        @foreach($user_role as $user_roles)
                            <tr>
                                <td>{{$listNum}}</td>
                                <td>{{$user_roles->user_role}}</td>
                                <td>{{$user_roles->updated_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <a href="{{route('user_role')}}/{{$user_roles->id}}"
                                       class="btn btn-primary mx-1"><i class="fas fa-edit"></i> Edit</a>
                                    <button
                                            data-toggle="modal" data-target="#deleteModal"
                                            data-href="{{url('user_roleDelete?delete='.$user_roles->id)}}"
                                            class="btn btn-danger mx-1"><i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <?php $listNum++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--- userrole View table End --->

            <!-- Central Modal Small -->
            <div class="modal fade text-dark" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            Are you sure to delete this User Role ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                            <a class="btn btn-primary btn-ok">Yes, Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Central Modal Small -->
</div>
<!-- userrole End -->

@endsection
