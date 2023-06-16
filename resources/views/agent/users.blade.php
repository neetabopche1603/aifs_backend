@extends('agent.layouts.app')
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
@if ($msg = Session::get('msg'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $msg }}</strong>
    </div>
    @endif
<!-- Page-header end -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>All Users</h5>

                                <!-- <a href="#" class="btn btn-success btn-sm waves-effect waves-light float-md-right"> <i class="fa fa-plus" aria-hidden="true"></i>Add New Category</a> -->

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
                                                        <th>FirstName </th>
                                                        <th>Last Name</th>
                                                        <th>Loan Category</th>
                                                        <th>Loan Amount</th>
                                                        <th>Tenure</th>
                                                        <th>Update Status</th>

                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php $i = 1;
                                                    ?>
                                                    @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$user->first_name}}</td>
                                                        <td>{{$user->last_name}}</td>
                                                        <td>{{$user->category_name}}</td>
                                                        <td>{{$user->amount}}</td>
                                                        <td>{{$user->tenure}}</td>

                                                        <td>
                                                            <form action="{{route('status.update')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <select name="status" class="form-select-control form-control" aria-label="Default select example">
                                                                        <option value="">--Select Status--</option>
                                                                        <option value="0">Submission</option>
                                                                                <option {{ ($user->loan_status) == 1 ? 'selected' : '' }} value="1">Process</option>
                                                                                <option value="2" {{ ($user->loan_status) == 2 ? 'selected' : '' }}>Bank</option>
                                                                                <option value="3" {{ ($user->loan_status) == 3 ? 'selected' : '' }}>Approved </option>
                                                                                <option value="4" {{ ($user->loan_status) == 4 ? 'selected' : '' }}>Rejected </option>
                                                                                <option value="5" {{ ($user->loan_status) == 5 ? 'selected' : '' }}>pending</option>
                                                                            </select></div>
                                                                        <div class="col-md-2 mt-2 text-center"><button type="submit" class="btn btn-success btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i></button></div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>

                                                        <td><button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu">
                                                                <!-- <a class="dropdown-item" href="#">Action</a> -->
                                                                <a class="dropdown-item" href="{{url('admin/userview')}}/{{$user->id}}">View</a>
                                                                <a class="dropdown-item" href="{{url('admin/userDelete')}}/{{$user->id}}" onclick="return confirm('Are You Sure Delete This User.')">Delete</a>
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