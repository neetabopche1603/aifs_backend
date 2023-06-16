@extends('admin.layouts.app')
<!-- @section('admintitle', 'Setting') -->
@section('main-container')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Sample page</h5>
                    <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}"> <i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Admin Profile</h5>
                            </div>
                            <div class="card-block">
                                <!-- Row start -->
                                <div class="row m-b-30">
                                    <div class="col-lg-12 col-xl-12">
                                        
                                       
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