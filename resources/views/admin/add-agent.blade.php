@extends('admin.layouts.app')
@section('main-container')

<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Agent</h5>
                    <p class="m-b-0">Add New Agent</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="#!">Basic Components</a>
                                            </li> -->
                    <li class="breadcrumb-item"><a href="{{url('basic/agent')}}">Agent</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
<div class="container add-btn mt-lg-2 mb-lg-2">
    <a href="{{url('basic/agent')}}" class="float-right btn btn-warning btn-sm waves-effect waves-light"><i class="fa fa-backward" aria-hidden="true"></i>Back</a>
    <div class="text-center">
    <h1>Agent Register Form</h1>
</div>
</div><br>
<div class="container  mt-lg-2">
    @if ($msg = Session::get('msg'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $msg }}</strong>
    </div>
    @endif
    <div class="shadow p-3 mb-5 bg-white rounded">
        <form id="quickForm" method="POST" action="{{url('save-agent')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                        <div class="col-md-6 form-group">
                            <label for="">Name <span class="text-danger text-bold">*</span></label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Your Name">
                            <span class="text-danger font-weight-bold">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Email <span class="text-danger text-bold">*</span></label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Enter Your Email">
                            <span class="text-danger font-weight-bold">
                            @error('email')
                            {{$message}}
                            @enderror
                        </span>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Password <span class="text-danger text-bold">*</span></label>
                            <input type="password" name="password" class="form-control" id="" placeholder="Enter Password">
                            <span class="text-danger font-weight-bold">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">Comfirm Password <span class="text-danger text-bold">*</span></label>
                            <input type="password" name="password_confirm" class="form-control" id="" placeholder="">
                            <span class="text-danger font-weight-bold">
                            @error('password_confirm')
                            {{$message}}
                            @enderror
                        </span>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" id="" placeholder="">
                            <span class="text-danger font-weight-bold">
                            @error('image')
                            {{$message}}
                            @enderror
                        </span>
                        </div>
                        
                    </div>
                <!-- </div> -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection