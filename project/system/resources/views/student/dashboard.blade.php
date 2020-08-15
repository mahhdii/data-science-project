@extends('student.master')

@section('content')


        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->


            <div class="col-md-4">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-3">
                                <span class="fa  fa-th-large fa-4x"></span>
                            </div>
                            <div class="col-9">
                                <h4>All Campaigns</h4>
                                <p>{{$allCampaigns}}</p>
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
                                <h4>Approved Campaigns</h4>
                                <p>{{$approvedCampaigns}}</p>
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
                                <span class="fa fa-close fa-4x"></span>
                            </div>
                            <div class="col-9">
                                <h4>Unapproved Camp.</h4>
                                <p>{{$unapprovedCampaigns}}</p>
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
                            <th>Campaign Name</th>
                            <th>Reasons</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Amount Raised</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($campaigns as $campaign)
                            <tr>
                                <td>{{$campaign->id}}</td>
                                <td>{{$campaign->campaign_name}}</td>
                                <td>{{$campaign->reason}}</td>
                                <td>{{$campaign->category_name}}</td>
                                <td>N{{$campaign->amount}}</td>
                                <td>N{{$campaign->amount_raised}}</td>
                                @if($campaign->status == "Unapproved")
                                    <td><span class="text-danger">Unapproved</span></td>
                                @elseif($campaign->status == "Approved")
                                    <td><span class="text-success">Approved & Active</span></td>
                                @elseif($campaign->status == "Completed")
                                    <td><span class="text-primary">Approved & Completed</span></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
@endsection