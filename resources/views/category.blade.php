<?php
/**
 * Created by PhpStorm.
 * User: Nayem
 * Date: 09-Nov-18
 * Time: 2:10 AM
 */
?>
@extends('layout.app')
@section('content')
    <!--- Category Start --->

    <div class="container-fluid p-2 pt-4">
        <!--- Category All Alert Start --->
        @if ($errors->has('category_name'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ $errors->first('category_name') }}
            </div>
        @endif
                        <div class="col-lg-10">
                            @if(session()->has('category'))
                            <div class="alert alert-success">
                               {{ session()->get('category') }}
                            </div>
                            @endif
                        </div>
        
    <!--- Category All Alert End --->

        <div class="float-left">
            <h3>Category Management</h3>
        </div>
        <div class="float-right mt-1">
            Home > Category
        </div>
        <button class="btn btn-primary clearfix float-right  my-2" data-toggle="collapse" data-target="#demo">
            <i class="fas fa-plus"></i> Category
        </button>

        <!--- Collapse Add Category form Start --->
        <div id="demo" class="collapse clearfix">
            <div class="card welcome-wrapper shadow-reset">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                                    <!-- form start -->
                            <form role="form" class="form-inline" action="{{ url('CategoryInsert') }}" method="post">
                                {{ csrf_field() }}
                                    <label class="mr-sm-2" for="category_name">Category Name</label>
                                    <input class="form-control" id="category_name" name="category_name" required>
                                <button type="submit" class="btn btn-success">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- Collapse Add Category form End --->

        <!--- Update Category form Start --->
        @if(isset($categoryUpdate))
            <div id="demo" class="clearfix">
                <div class="card panel-default welcome-wrapper shadow-reset">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                 <!-- form start -->
                                <form role="form" action="{{ url('CategoryUpdate/'.$categoryUpdate->id)}}"
                                      method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input class="form-control" value="{{$categoryUpdate->category_name}}"
                                               name="category_name" id="category_name" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update Category</button>
                                    <a href="{{route('category')}}" class="btn btn-warning">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
    <!--- Update Category form End --->

        <!--- Category View table Start --->
        <div class="card clearfix welcome-wrapper shadow-reset mt-4">
            <div class="card-body table-responsive">
                <table id="example" class="table table-bordered table-dark welcome-wrapper" style="text-align: center;">
                    
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $listNum = 1; ?>
                    @foreach($category as $categorys)
                        <tr>
                            <td>{{$listNum}}</td>
                            <td>{{$categorys->category_name}}</td>
                            <td>{{$categorys->updated_at->diffForHumans()}}</td>
                            <td class="text-center">
                                <a href="{{route('category')}}/{{$categorys->id}}"
                                   class="btn btn-primary mx-1"><i class="fas fa-edit"></i> Edit</a>
                                <button
                                        data-toggle="modal" data-target="#deleteModal"
                                        data-href="{{url('CategoryDelete?delete='.$categorys->id)}}"
                                        class="btn btn-danger mx-1"><i class="fas fa-trash-alt"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <?php $listNum++; ?>
                    @endforeach
                    </tbody>
                </table>
                <!--- Pagination Bar Start --->
                 
                <!--- Pagination Bar End --->
            </div>
        </div>
        <!--- Category View table End --->

        <!-- Central Modal Small -->
        <div class="modal fade text-dark" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        Are you sure want to delete this Category, If you delete this the category, sub category,
                        and item also deleted.
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
    <!-- Category End -->

@endsection
