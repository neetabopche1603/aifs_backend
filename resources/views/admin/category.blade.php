@extends('admin.layouts.app')
@section('main-container')

<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Categories</h5>
                    <p class="m-b-0">Show All Categories Data Table</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Category</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
    @if ($msg = Session::get('msg'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $msg }}</strong>
    </div>

    @elseif ($deleteMsg = Session::get('deleteMsg'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $deleteMsg }}</strong>
    </div>
    @elseif (Session::get('faild'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ Session::get('faild') }}</strong>
    </div>
    @endif

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>All Categories</h5>

                                <a href="{{url('admin/add-category')}}" class="btn btn-success btn-sm waves-effect waves-light float-md-right"> <i class="fa fa-plus" aria-hidden="true"></i>Add New Category</a>

                            </div>
                            <div class="card-block">
                                <!-- Row start -->
                                <div class="row m-b-30">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="shadow p-3 bg-white rounded">
                                            <table id="example" class="display nowrap table table-bordered table-striped text-center" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S.No.</th>
                                                        <th>Category Name</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- {{$i=1}} -->
                                                    @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$category['category_name']}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu">
                                                                <!-- <a class="dropdown-item" href="#">Action</a> -->
                                                                <a class="dropdown-item" href="{{url('admin/edit-category')}}/{{$category->id}}">Edit</a>
                                                                <a class="dropdown-item" href="{{url('admin/delCategory')}}/{{$category->id}}" onclick="return confirm('Are You sure Delete this Category')">Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection