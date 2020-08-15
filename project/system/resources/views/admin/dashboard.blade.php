@extends('admin.master')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <!-- Column -->

        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-3">
                            <span class="fa fa-users fa-4x"></span>
                        </div>
                        <div class="col-9">
                            <h3>Students</h3>
                            <p>{{$totalStudents}}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-3">
                            <span class="fa  fa-th-large fa-4x"></span>
                        </div>
                        <div class="col-9">
                            <h3>All Campaigns</h3>
                            <p>{{$totalCampaigns}}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-3">
                            <span class="fa fa-check fa-4x"></span>
                        </div>
                        <div class="col-9">
                            <h3>Active Campaigns</h3>
                            <p>{{$activeCampaigns}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="card">
            <div class="card-block">
                <h3>Recent campaigns</h3>
                <hr>

                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Campaign Name</th>
                        <th>Reasons</th>
                        <th>Amount</th>
                        <th>Amount Raised</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($campaigns as $campaign)
                        <tr>
                            <td>{{$campaign->id}}</td>
                            <td>{{$campaign->first_name}} {{$campaign->last_name}}</td>
                            <td>{{$campaign->campaign_name}}</td>
                            <td>{{$campaign->reason}}</td>
                            <td>N{{$campaign->amount}}</td>
                            <td>N{{$campaign->amount_raised}}</td>

                            <td>{{$campaign->category_name}}</td>
                            @if($campaign->status == "Unapproved")
                                <td><span class="text-danger">Unapproved</span></td>
                            @elseif($campaign->status == "Approved")
                                <td><span class="text-success">Approved & Active</span></td>
                            @elseif($campaign->status == "Completed")
                                <td><span class="text-primary">Approved & Completed</span></td>
                            @endif



                            @if($campaign->status == "Unapproved")
                                <td><button  data-id="{{$campaign->id}}" class="btn btn-success waves-effect approval-btn" >Approve</button></td>
                            @else
                                <td><button data-id="{{$campaign->id}}"  class="btn btn-warning waves-effect approval-btn">Disapprove</button></td>
                            @endif
                            {{--<td><button--}}
                                        {{--data-id="{{$campaign->id}}"--}}
                                        {{--data-student-id="{{$campaign->student_id}}"--}}
                                        {{--data-name="{{$campaign->campaign_name}}"--}}
                                        {{--data-reason="{{$campaign->reason}}"--}}
                                        {{--data-amount="{{$campaign->amount}}"--}}
                                        {{--class="btn btn-primary waves-effect edit-btn">Edit</button></td>--}}
                            {{--<td><button class="btn btn-danger waves-effect delete-btn"  data-id="{{$campaign->id}}">Delete</button></td>--}}

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="approval_form" method="post">
        @csrf
        @method("PATCH")
    </form>


@endsection

@section("scripts")
    @parent






    <script>
        var actionUrl = "{{route('admin.campaign.create')}}";

        var approval = $(".approval-btn");
        var approvalForm = $("#approval_form");

        approval.click(function (ev) {
            approvalForm.attr("action",actionUrl+"/approval/"+$(ev.target).data('id'));
            approvalForm.submit();
        });
    </script>
@endsection