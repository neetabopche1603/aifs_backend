@extends('admin.layouts.app')
@section('main-container')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">USER'S PROFILE</h5>
                    <p class="m-b-0">Show Users Detail's</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="#!">Basic Components</a>
                    </li> -->
                    <li class="breadcrumb-item"><a href="{{url('user')}}">User</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    label {
        font-weight: 700;
        color: #365d9d;
    }
</style>
<!-- Page-header end -->
<div class="container add-btn mt-1">
    <a href="{{url('user')}}" class="float-right btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-backward" aria-hidden="true"></i>Back</a>
</div>

<div class="shadow p-3 mb-5 bg-white rounded container">
    <div class="text-lg-center">
        <img src="{{ asset('user_images/'.$users[0]['avatar']) }}" alt="" width="150" height="150" class="rounded-circle">
        
    </div>
    <div class="text-lg-center pr-5 mt-2">
        <?php
        if ($users[0]['loan_status'] == 0) {
            echo "<span class='badge badge-primary'>Submission</span>";
        } elseif ($users[0]['loan_status'] == 1) {
            echo "<span class='badge badge-info'>Process</span>";
        } elseif ($users[0]['loan_status'] == 2) {
            echo "<span class='badge badge-warning'>Bank</span>";
        } elseif ($users[0]['loan_status'] == 3) {
            echo "<span class='badge badge-success'>Approved</span>";

        } elseif ($users[0]['loan_status'] == 4) {
            echo "<span class='badge badge-danger'>Rejected</span>"; 
        }
        else {
            echo "<span class='badge badge-secondary'>Pending</span>";
        }
        ?>
    </div>
    <form id="quickForm" method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <!-- <div class="col-md-12"> -->
                <div class="col-md-4 form-group">
                    <label for="">First Name : </label>
                    <input type="text" name="first_name" class="form-control" id="" placeholder="" value="{{$users[0]['first_name']}}" readonly>

                </div>

                <div class="col-md-4 form-group">
                    <label for="">Last Name : </label>
                    <input type="text" name="last_name" class="form-control" id="" value="{{$users[0]['last_name']}}" placeholder="Enter Your Name" readonly>

                </div>

                <div class="col-md-4 form-group">
                    <label for="">Gender : </label>
                    <input type="redio" name="gender" class="form-control" id="" value="<?php if ($users[0]['gender'] == 0) {
                                                                                            echo 'Male';
                                                                                        } else {
                                                                                            echo 'Female';
                                                                                        }
                                                                                        ?>" placeholder="Enter Your Email" readonly>

                </div>

                <div class="col-md-4 form-group">
                    <label for="">Date Of Birth : </label>
                    <input type="date" name="dob" class="form-control" id="" value="{{$users[0]['dob']}}" placeholder="" readonly>

                </div>
                <div class="col-md-4 form-group">
                    <label for="">Aadhar Number : </label>
                    <input type="text" name="aadhar_number" class="form-control" id="" value="{{$users[0]['aadhar_no']}}" placeholder="" readonly>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Pan Card Number : </label>
                    <input type="text" name="pan_number" class="form-control" id="" value="{{$users[0]['pan_no']}}" placeholder="" readonly>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Mobile Number : </label>
                    <input type="number" name="mobile_number" class="form-control" id="" value="{{$users[0]['mobile_number']}}" placeholder="" readonly>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Category : </label>
                    <input type="text" name="category_name" class="form-control" id="" value="{{$users[0]['category_name']}}" placeholder="" readonly>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Tenure : </label>
                    <input type="text" name="tenure" class="form-control" id="" value="{{$users[0]['tenure']}} Months" placeholder="" readonly>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Amount : </label>
                    <input type="text" name="amount" class="form-control" id="" value="{{$users[0]['amount']}}" placeholder="" readonly>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Payment Mode : </label>
                    <input type="text" name="payment_mode" class="form-control" id="" value="<?php
                                                                                                if ($users[0]['payment_mode'] == 1) {
                                                                                                    echo "Online";
                                                                                                } else {
                                                                                                    echo "Offline";
                                                                                                }

                                                                                                ?>" placeholder="" readonly>
                </div>



                <div class="col-md-4 form-group">
                    <label for="">Account Holder Name : </label>
                    <input type="text" name="account_holder_name" class="form-control" id="" value="{{$users[0]['account_holder_name']}}" placeholder="" readonly>
                </div>


                <div class="col-md-4 form-group">
                    <label for="">Bank Name : </label>
                    <input type="text" name="bank_name" class="form-control" id="" value="{{$users[0]['first_name']}}" placeholder="" readonly>
                </div>


                <div class="col-md-4 form-group">
                    <label for="">IFSC Code : </label>
                    <input type="text" name="ifsc_code" class="form-control" id="" value="{{$users[0]['ifsc_code']}}" placeholder="" readonly>
                </div>


                <div class="col-md-4 form-group">
                    <label for="">Account Number : </label>
                    <input type="text" name="account_number" class="form-control" id="" value="{{$users[0]['account_number']}}" value="{{$users[0]['first_name']}}" placeholder="" readonly>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Aadhar Front : </label><br>
                    <a href="{{ url('user_documents/'.$users[0]['aadhar_front']) }}" target="_blank"><img src="{{ asset('user_documents/'.$users[0]['aadhar_front']) }}" alt="" width="200" height="100" class=""></a>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">Aadhar Back : </label><br>
                    <a href="{{ url('user_documents/'.$users[0]['aadhar_back']) }}" target="_blank"><img src="{{ asset('user_documents/'.$users[0]['aadhar_back']) }}" alt="" width="200" height="100" class=""></a>
                </div>

                <div class="col-md-4 form-group">
                    <label for="">PanCard : </label> <br>
                    <a href="{{ url('user_documents/'.$users[0]['pan_card']) }}" target="_blank">
                        <img src="{{ asset('user_documents/'.$users[0]['pan_card'])}}" alt="" width="200" height="100" class="">
                    </a>
                </div>

            </div>
            <!-- </div> -->
        </div>
        <!-- /.card-body -->

    </form>
</div>

@endsection