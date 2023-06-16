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

                                <a href="#" class="btn btn-success btn-sm waves-effect waves-light float-md-right"> <i class="fa fa-plus" aria-hidden="true"></i>Add New Category</a>

                            </div>
                            <div class="card-block">
                            <div class="col-md-2 mb-lg-4">
                            <h5 class="text-primary">Loan Status:</h5>
                                        <select class="form-select-control" id="loan_status" aria-label="Default select example">
                                            <option selected>Select Loan Status</option>
                                            <option value="0">Submission</option>
                                            <option value="1">Process</option>
                                            <option value="2">Bank</option>
                                            <option value="3">Approved</option>
                                            <option value="4">Rejected</option>
                                            <option value="5">Pending</option>
                                        </select>
                                    </div>

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
                                                    @foreach ($leads as $lead)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$lead->name}}</td>
                                                        <td>{{$lead->first_name}} {{$lead->last_name}}</td>
                                                        <td>{{$lead->category_name}}</td>
                                                        <td>{{$lead->amount}}</td>
                                                        <td>{{$lead->tenure}}</td>

                                                        <td>
                                                            <?php
                                                            if ($lead['loan_status'] == 0) {
                                                                echo "<span class='badge badge-primary'>Submission</span>";
                                                            } elseif ($lead['loan_status'] == 1) {
                                                                echo "<span class='badge badge-info'>Process</span>";
                                                            } elseif ($lead['loan_status'] == 2) {
                                                                echo "<span class='badge badge-warning'>Bank</span>";
                                                            } elseif ($lead['loan_status'] == 3) {
                                                                echo "<span class='badge badge-success'>Approved</span>";
                                                            } elseif ($lead['loan_status'] == 4) {
                                                                echo "<span class='badge badge-danger'>Rejected</span>";
                                                            } else {
                                                                echo "<span class='badge badge-secondary'>Pending</span>";
                                                            }
                                                            ?>
                                                        </td>

                                                        <td><button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu">
                                                                <!-- <a class="dropdown-item" href="#">Action</a> -->
                                                                <a class="dropdown-item" href="{{route('user.view',$lead->id)}}">View</a>

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