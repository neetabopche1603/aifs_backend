@extends('admin.layouts.app')
@section('main-container')

<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Agent</h5>
                    <p class="m-b-0">Show All Agent Data Table</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Agent</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
<div class="container mt-2 mb-2">
    <a href="{{url('admin/add-agent')}}" class="btn btn-success btn-sm waves-effect waves-light float-md-right"> <i class="fa fa-plus" aria-hidden="true"></i>Agent Register</a>
</div>
<br>
<div class="container card mt-lg-4">
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
    <div class="shadow p-3 mb-5 bg-white rounded">
        <table id="example" class="display nowrap table table-bordered table-striped text-center" style="width:100%">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <!-- {{$i=1}} -->
                @foreach ($agent as $agentData)
                <tr>
                    <td>{{$i++}}</td>
                    <!-- <td>{{$agentData['image']}}</td> -->
                    <td>
                        <img src="{{ asset('agent_img/'.$agentData->image) }}" width="100" height="100" alt="image">
                    </td>

                    <td>{{$agentData['name']}}</td>
                    <td>{{$agentData['email']}}</td>
                    <td>
                    @if ($agentData->type == 0)
                      <span class="badge badge-success">Admin</span>
                      @else
                      <span class="badge badge-primary">Agent</span>
                      @endif
                    </td>
                    <td>
                    @if ($agentData->status == 1)
                      <a href="{{url('agent-block')}}/{{$agentData->id}}" onclick="return confirm('Are You Sure Block This Agent.')"><span class="badge badge-success">Active</span></a>
                      @else
                      <a href="{{url('agent-active')}}/{{$agentData->id}}" onclick="return confirm('Are You Sure Active This Agent.')"><span class="badge badge-danger">Block</span></a>
                      @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu">
                            <!-- <a class="dropdown-item" href="#">Action</a> -->
                            <a class="dropdown-item" href="{{url('admin/edit-agent')}}/{{$agentData->id}}">Edit</a>

                            <a class="dropdown-item" href="{{url('admin/delete-agent')}}/{{$agentData->id}}" onclick="return confirm('Are You sure Delete this Agent')">Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection