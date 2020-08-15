@extends('student.master')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">My Campaigns</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">My Campaigns</li>
            </ol>
        </div>

        <div class="col-md-7 col-4 align-self-center">
            <button data-toggle="modal" data-target="#campaign-modal" id="modal-trigger" class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"> New Campaign</button>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Campaigns</h4>
                    <h6 class="card-subtitle">List of all student campaigns</h6>
                    <div class="table-responsive">
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

                                <th colspan="2">Action</th>
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

                                    <td><button
                                                data-id="{{$campaign->id}}"
                                                data-name="{{$campaign->campaign_name}}"
                                                data-reason="{{$campaign->reason}}"
                                                data-amount="{{$campaign->amount}}"
                                                class="btn btn-primary waves-effect edit-btn">Edit</button></td>
                                    <td><button class="btn btn-danger waves-effect delete-btn"  data-id="{{$campaign->id}}">Delete</button></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="delete_form" method="post" class="d-none">
        @csrf
        @method('DELETE')
    </form>





    <!-- ==================================================  -->
    <!-- New Campaign Form Modal -->
    <!-- ======================================== -->



    <div class="modal fade" id="campaign-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal form-material" id="campaign-form" method="post" action="{{route('student.campaign.create')}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Campaign</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="col-md-12">Campaign Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="campaign_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Category</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Reasons for funding</label>
                            <div class="col-md-12">
                                <textarea class="form-control"  rows="3" name="reason"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Amount</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control form-control-line" name="amount">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ================================================= -->
    <!-- End New Campaign Modal -->
    <!-- =========================================================== -->


@endsection

@section('scripts')
    @parent
    <script>

        var editBtn = $('.edit-btn');
        var trigger = $("#modal-trigger");
        var actionUrl = "{{route('student.campaign.create')}}";
        var form = $("#campaign-form");
        var modal = $('#campaign-modal');


        var cname = $("input[name='campaign_name']");
        var reason = $("textarea[name='reason']");
        var amount = $("input[name='amount']");


        editBtn.click(function (ev) {
            var btn = $(ev.target);
            // $("select[name='student_id'] option[value="+btn.data("student-id")+"]").attr('selected',true);
            $("select[name='category_id'] option[value="+btn.data("category-id")+"]").attr('selected',true);

            form.append($('<input type="hidden" name="_method" value="PATCH">'));
            form.attr('action',actionUrl+"/"+btn.data('id'));
            cname.val(btn.data('name'));
            reason.val(btn.data('reason'));
            amount.val(btn.data('amount'));
            modal.modal('show');
        });


        trigger.click(function (ev) {
            $("input[name='_method']").remove();
            cname.val('');
            reason.val('');
            amount.val('');
            form.attr('action',actionUrl);
        });





        //---------------------------------------------




        var deleteBtn = $(".delete-btn");

        var deleteForm = $("#delete_form");


        deleteBtn.click(function (ev) {
            var yes = confirm("Do you want to delete campaign");
            if(yes){
                deleteForm.attr('action',actionUrl+"/"+$(ev.target).data('id'));
                deleteForm.submit();
            }
        });
























        //--------------------------------------------------------



    </script>



@endsection