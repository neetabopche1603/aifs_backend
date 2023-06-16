@extends('admin.layouts.app')
<!-- @section('admintitle', 'Setting') -->
@section('main-container')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Assigned Lead's</h5>
                    <p class="m-b-0">Admin Assigned Lead's To Agent..</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#"> <i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Assegned Leads</a>
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
                                <h5>Assigned Lead's</h5>

                                <a href="#" class="btn btn-success btn-sm waves-effect waves-light float-md-right"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>

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
                                                        <th>Agent Name</th>
                                                        <th>Name</th>
                                                        <th>Loan Category</th>
                                                        <th>Loan Amount</th>
                                                        <th>Tenure</th>
                                                        <th>Status</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- {{$i=1}} -->

                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>Testing</td>
                                                        <td>Testing</td>
                                                        <td>Testing</td>
                                                        <td>Testing</td>
                                                        <td>Testing</td>

                                                        <td>

                                                        </td>

                                                        <td><button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                           
                                                        </td>

                                                    </tr>



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