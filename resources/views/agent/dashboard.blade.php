<?php
use Illuminate\Support\Facades\DB;
?>
@extends('agent.layouts.app')
@section('main-container')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                    <p class="m-b-0">Welcome to Active India Financial services</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<?php
  $admin = Db::table('admins')->count();
  $submission_loan =DB::table('user_loans')->where('loan_status',0)->count();
  $process_loan =DB::table('user_loans')->where('loan_status',1)->count();
  $bank_loan =DB::table('user_loans')->where('loan_status',2)->count();
  $approval_Loan =DB::table('user_loans')->where('loan_status',3)->count();
  $rejected_loan =DB::table('user_loans')->where('loan_status',4)->count();
  $pending_loan = DB::table('user_loans')->join('users','users.id','=','user_loans.user_id')->where('users.agent_id',session()->get('agent_id'))->where('user_loans.loan_status',5)->count();
  ?>

<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">           
                    <div class="col-xl-12 col-md-12">
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Total Lead's</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-user-o m-r-15 text-c-red fa-2x"></i> {{$admin}}</h4>
                                        <!-- <p class="m-b-0">36% From Last 6 Months</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Submission Loan</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-table fa-2x m-r-15 text-c-green"></i>{{$submission_loan}}</h4>
                                        <!-- <p class="m-b-0">36% From Last 6 Months</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Process Loan</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-th-large fa-2x m-r-15 text-c-red 2x"></i>{{$process_loan}}</h4>
                                        <!-- <p class="m-b-0">36% From Last 6 Months</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Bank Loan</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-indent fa-2x m-r-15 text-c-green"></i>{{$bank_loan}}</h4>
                                        <!-- <p class="m-b-0">36% From Last 6 Months</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Approval Loan</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa fa-list fa-2x m-r-15 text-c-red"></i>{{$approval_Loan}}</h4>
                                        <!-- <p class="m-b-0">36% From Last 6 Months</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Rejected Loan</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa fa-asterisk fa-2x m-r-15 text-c-green"></i>{{$rejected_loan}}</h4>
                                        <!-- <p class="m-b-0">36% From Last 6 Months</p> -->
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-3">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Pending Loan</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa fa-asterisk fa-2x m-r-15 text-c-green"></i>{{$pending_loan}}</h4>
                                        <!-- <p class="m-b-0">36% From Last 6 Months</p> -->
                                    </div>
                                </div>
                            </div>

                            <!-- sale card end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>

@endsection