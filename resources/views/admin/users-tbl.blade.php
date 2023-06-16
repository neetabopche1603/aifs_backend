@extends('admin.layouts.app')
@section('main-container')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Users</h5>
                    <p class="m-b-0">All User's Data show</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <!-- <li class="breadcrumb-item"><a href="#!">Basic Components</a>
                                            </li> -->
                    <li class="breadcrumb-item"><a href="#">USERS</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-2">
            <select class="form-select-control" id="agent" aria-label="Default select example">
                <option selected>Select User</option>
                @foreach ($agents as $agent )
                <option value="{{$agent->id}}">{{$agent->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary lead_assign" data-url="{{ route('lead.assign') }}">Assign Lead</button>
        </div>

    </div>
</div>
<!-- Page-header end -->
<div class="container card mt-lg-4">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <table id="example" class="display nowrap table table-bordered table-striped text-center" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 5%;">
                        <input class="form-check-input" type="checkbox" id="master">
                    </th>
                    <th>S.No.</th>
                    <th>FirstName </th>
                    <th>Last Name</th>
                    <th>Loan Category</th>
                    <th>Loan Amount</th>
                    <th>Tenure</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                <?php $i = 1; ?>
                @foreach ($users as $user)
                <tr id="tr_{{$user->id}}">
                    <td><input class="form-check-input sub_chk" type="checkbox" data-id="{{$user->id}}"></td>
                    <td>{{$i++}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->category_name}}</td>
                    <td>{{$user->amount}}</td>
                    <td>{{$user->tenure}}</td>

                    <td>
                        <?php
                        if ($user['loan_status'] == 0) {
                            echo "<span class='badge badge-primary'>Submission</span>";
                        } elseif ($user['loan_status'] == 1) {
                            echo "<span class='badge badge-info'>Process</span>";
                        } elseif ($user['loan_status'] == 2) {
                            echo "<span class='badge badge-warning'>Bank</span>";
                        } elseif ($user['loan_status'] == 3) {
                            echo "<span class='badge badge-success'>Approved</span>";
                        } elseif ($user['loan_status'] == 4) {
                            echo "<span class='badge badge-danger'>Rejected</span>";
                        } else {
                            echo "<span class='badge badge-secondary'>Pending</span>";
                        }
                        ?>
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

@endsection
@push('scripts')
<script>
    $(document).ready(function() {

                $('#master').on('click', function(e) {
                    if ($(this).is(':checked', true)) {
                        $(".sub_chk").prop('checked', true);
                    } else {
                        $(".sub_chk").prop('checked', false);
                    }
                });

                $('.lead_assign').on('click', function(e) {

                    var allVals = [];
                    $(".sub_chk:checked").each(function() {
                        allVals.push($(this).attr('data-id'));
                    });

                    if (allVals.length <= 0) {
                        alert("Please select row.");
                    } else {

                        var check = confirm("Are you sure you want to assign lead?");
                        if (check == true) {

                            var join_selected_values = allVals.join(",");
                            var agent_id = $('#agent').val();
                            $.ajax({
                                url: $(this).data('url'),
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {'ids':join_selected_values,'agent_id':agent_id},
                                success: function(data) {
                                    if (data['success']) {
                                        $(".sub_chk:checked").each(function() {
                                            $(this).parents("tr").remove();
                                        });
                                        alert(data['success']);
                                    } else if (data['error']) {
                                        alert(data['error']);
                                    } else {
                                        alert('Whoops Something went wrong!!');
                                    }
                                },
                                error: function(data) {
                                    alert(data.responseText);
                                }
                            });

                            $.each(allVals, function(index, value) {
                                $('table tr').filter("[data-row-id='" + value + "']").remove();
                            });
                        }
                    }
                });
            });
</script>
@endpush