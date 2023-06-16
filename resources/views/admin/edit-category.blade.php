@extends('admin.layouts.app')
@section('main-container')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Categories</h5>
                    <p class="m-b-0">Edit Categories</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="#!">Basic Components</a>
                                            </li> -->
                    <li class="breadcrumb-item"><a href="{{url('admin/category')}}">Category</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
<div class="container add-btn mt-lg-2 mb-lg-2">
    <a href="{{url('admin/category')}}" class="float-right btn btn-warning waves-effect waves-light"><i class="fa fa-backward" aria-hidden="true"></i>Back</a>
</div><br><br>

<div class="container mt-lg-4">
    @if ($msg = Session::get('msg'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $msg }}</strong>
    </div>
    @endif
    <div class="shadow p-3 mb-5 bg-white rounded">
        <form id="quickForm" method="POST" action="{{url('admin/editCategory')}}">
            @csrf
            <input type="hidden" name="id" value="{{$category->id}}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Category Name <span class="text-danger text-bold">*</span></label>
                            <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" id="" placeholder="Enter Category Name">
                        </div>
                        <span class="text-danger font-weight-bold">
                            @error('category_name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection