@extends('admin.master')

@section('content')


    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Campaigns</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Campaigns</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <button data-toggle="modal" data-target="#campaign-modal" id="modal-trigger"  class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"> New Campaign</button>
        </div>
    </div>


    <div class="row">
        <!-- column -->
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
                                <th>Student</th>
                                <th>Campaign Name</th>
                                <th>Reasons</th>
                                <th>Amount</th>
                                <th>Amount Raised</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th ></th>
                                <th ></th>
                                <th ></th>
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
                                            <td><button
                                                        data-id="{{$campaign->id}}"
                                                        data-student-id="{{$campaign->student_id}}"
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



    <div class="forms d-none">
        <form id="delete_form" method="post">
            @csrf
            @method('DELETE')
        </form>

        <form id="approval_form" method="post">
            @csrf
            @method("PATCH")
        </form>

    </div>



    <div class="modal fade" id="campaign-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal form-material" id="campaign-form"  method="post" action="{{route('admin.campaign.create')}}">

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
                            <label class="col-sm-12">Select Student</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="student_id">
                                  @foreach($students as $student)
                                      <option value="{{$student->id}}" >{{$student->first_name}} {{$student->last_name}}</option>
                                  @endforeach
                                </select>
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
                            <label class="col-md-12">Campaign Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="campaign_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Reasons for funding</label>
                            <div class="col-md-12">
                                <textarea class="form-control"  rows="3" name="reasons"></textarea>
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
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection


@section('scripts')
    @parent
    <script src="{{asset("js/datatables.min.js")}}"></script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>

    <script>

       var editBtn = $('.edit-btn');
       var trigger = $("#modal-trigger");
       var actionUrl = "{{route('admin.campaign.create')}}";
       var form = $("#campaign-form");
       var modal = $('#campaign-modal');


       var cname = $("input[name='campaign_name']");
       var reason = $("textarea[name='reasons']");
       var amount = $("input[name='amount']");


       editBtn.click(function (ev) {
           var btn = $(ev.target);
           $("select[name='student_id'] option[value="+btn.data("student-id")+"]").attr('selected',true);
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

       var approval = $(".approval-btn");
       var deleteBtn = $(".delete-btn");

       var approvalForm = $("#approval_form");
       var deleteForm = $("#delete_form");


       deleteBtn.click(function (ev) {
           var yes = confirm("Do you want to delete campaign");
           if(yes){
               deleteForm.attr('action',actionUrl+"/"+$(ev.target).data('id'));
               deleteForm.submit();
           }
       });



       approval.click(function (ev) {
           approvalForm.attr("action",actionUrl+"/approval/"+$(ev.target).data('id'));
           approvalForm.submit();
       });





























        //--------------------------------------------------------


    </script>



@endsection
