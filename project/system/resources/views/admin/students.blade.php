@extends('admin.master')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Students</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Students</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <button data-toggle="modal" data-target="#student_modal" id="modal_trigger"  class="btn waves-effect waves-light btn-primary pull-right hidden-sm-down"> New Student</button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


    <!-- Start Page Content -->
    <!-- ============================================================== -->




    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Students</h4>
                    <h6 class="card-subtitle">List of all students </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Reg No.</th>
                                <th>Gender</th>
                                <th>Dept</th>
                                <th>Level</th>
                                <th>Phone No.</th>
                                <th>Email</th>
                                <th>Bank name</th>
                                <th>Account No.</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->first_name}}</td>
                                        <td>{{$student->middle_name}}</td>
                                        <td>{{$student->last_name}}</td>
                                        <td>{{$student->registration_no}}</td>
                                        <td>{{$student->gender}}</td>
                                        <td>{{$student->department}}</td>
                                        <td>{{$student->level}}</td>
                                        <td>{{$student->phone_no}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->bank_name}}</td>
                                        <td>{{$student->account_no}}</td>
                                        <td><button
                                                    class="btn btn-primary waves-effect edit-btn"
                                                    data-id="{{$student->id}}"
                                                    data-first-name="{{$student->first_name}}"
                                                    data-middle-name="{{$student->middle_name}}"
                                                    data-last-name="{{$student->last_name}}"
                                                    data-reg-no="{{$student->registration_no}}"
                                                    data-gender="{{$student->gender}}"
                                                    data-department="{{$student->department}}"
                                                    data-level="{{$student->level}}"
                                                    data-phone-no="{{$student->phone_no}}"
                                                    data-email="{{$student->email}}"
                                                    data-password="{{$student->password}}"
                                                    data-account-no ="{{$student->account_no}}"
                                                    data-bank-name = "{{$student->bank_name}}"

                                            >Edit</button> </td>
                                       @if($student->suspended)
                                            <td><a class="btn btn-success waves-effect" href="{{url('admin/students/suspend/'.$student->id)}}">Unsuspend</a> </td>
                                        @else
                                            <td><a class="btn btn-warning waves-effect" href="{{url('admin/students/suspend/'.$student->id)}}">Suspend</a> </td>
                                        @endif


                                            {{--<td><a class="btn btn-warning waves-effect" href="{{url('admin/students/suspend/'.$student->id)}}">Suspend</a> </td>--}}

                                       @if($student->baned)
                                         <td><span class="text-danger">Baned</span></td>
                                       @else
                                            <td><a class="btn btn-danger waves-effect ban-btn" href="{{url('admin/students/ban/'.$student->id)}}">Ban</a> </td>
                                        @endif

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="student_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form class="form-horizontal form-material"  method="post" id="student_form" action="{{route('admin.student.add')}}">
              @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Campaign</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-md-12">First Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-md-12">Middle Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="middle_name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-md-12">Last Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">


                            <div class="col-md-5 mt-4">
                                <div class="form-group pl-3">
                                    <label>Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"  id="male" value="Male" name="gender">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="female" value="Female" name="gender">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">Reg No</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="registration_no">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-12">Department</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="department">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">Level</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="level">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">Phone No.</label>
                                    <div class="col-md-12">
                                        <input type="tell" class="form-control form-control-line" name="phone_no">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control form-control-line" name="email">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Bank name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="bank_name">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Account No</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="account_no">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control form-control-line" name="password">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Confirm Password</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control form-control-line" name="confirm_password">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@section("scripts")
@parent
<script src="{{asset("js/datatables.min.js")}}"></script>
<script>
    $(document).ready( function () {
        $('.table').DataTable();
    } );
</script>

    <script>

         var firstName = $("input[name='first_name']");
         var middleName = $("input[name='middle_name']");
         var lastName =$("input[name='last_name']");

         var regNo = $("input[name='registration_no']");
         var depart = $("input[name='department']");
         var level = $("input[name='level']");
         var phoneNo = $("input[name='phone_no']");
         var email = $("input[name='email']");
         var bankName = $("input[name='bank_name']");
         var accountNo = $("input[name='account_no']");
         var password = $("input[name='password']");
         var confirmPassword = $("input[name='confirm_password']");

         var modal = $("#student_modal");
         var form = $("#student_form");
         var trigger = $("#modal_trigger");

         var actionUrl = "{{route('admin.student.add')}}";

         $(".ban-btn").click(function (ev) {
             var yes = confirm("Do you want to ban student? The ban would be permanent");
             if(!yes){
                 ev.preventDefault();
             }
         });
         
         

         $(".edit-btn").click(function(ev){

             var btn = $(ev.target);

             firstName.val(btn.data('first-name'));
             middleName.val(btn.data('middle-name'));
             lastName.val(btn.data('last-name'));
             regNo.val(btn.data('reg-no'));
             depart.val(btn.data('department'));
             level.val(btn.data("level"));

             phoneNo.val(btn.data('phone-no'));
             email.val(btn.data('email'));
             bankName.val(btn.data('bank-name'));
             accountNo.val(btn.data('account-no'));

             password.val(btn.data('password'));
             confirmPassword.val(btn.data('password'));
             modal.modal('show');
             $("input[name='gender']").attr("checked",false);
             $("input[value='"+btn.data('gender')+"']").attr('checked',true);


             form.append($('<input type="hidden" name="_method" value="PATCH">'));
             form.attr('action',actionUrl+"/"+btn.data('id'));


         });
         
         trigger.click(function () {
             firstName.val('');
             middleName.val('');
             lastName.val('');
             regNo.val('');
             depart.val('');
             level.val('');

             phoneNo.val('');
             email.val('');
             accountNo.val('');
             bankName.val('');
             password.val('');
             confirmPassword.val('');
             modal.modal('show');
             $("input[name='gender']").attr("checked",false);
             $("input[name='_method']").remove();
             form.attr('action',actionUrl);

         });

    </script>

@endsection