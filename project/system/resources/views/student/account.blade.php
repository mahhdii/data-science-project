@extends('student.master')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30">

                        <div class="img-wrapper">
                            @if($camp->profile_pic)
                                <img src="{{asset("storage/".$student->profile_pic)}}"  alt="" class="img-gcircle" width="150">
                            @else
                                <img src="{{asset("storage/profile_pictures/avatar.png")}}"  alt="" class="img-gcircle" width="150">
                            @endif
                           <div class="overlay" id="file-open">
                               <i style="font-size: 50px" class="mdi mdi-plus-circle-outline"></i>
                           </div>
                        </div>

                        <h4 class="card-title m-t-10">{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</h4>
                        <h6 class="card-subtitle">{{$student->department}}</h6>
                        <!-- <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div> -->
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" action="{{route("update_account")}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method("PATCH")

                        <input type="file" name="profile_picture" class="d-none" id="pic-input" accept="image/*">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-md-12">First Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" value="{{$student->first_name}}" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-md-12">Middle Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" value="{{$student->middle_name}}" name="middle_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-md-12">Last Name</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{$student->last_name}}" class="form-control form-control-line" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-5 mt-4">
                                <div class="form-group pl-3">
                                    <label>Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"  {{$student->gender=="Male"?"checked":""}} type="radio" id="male" value="Male" name="gender">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" {{$student->gender=="Female"?"checked":""}} type="radio" id="female" value="Female" name="gender">
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
                                        <input type="text" name="registration_no" value="{{$student->registration_no}}" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-md-12">Department</label>
                                    <div class="col-md-12">
                                        <input type="text" name="department" value="{{$student->department}}" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">Level</label>
                                    <div class="col-md-12">
                                        <input type="text" name="level" value="{{$student->level}}" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12" >Phone No.</label>
                                    <div class="col-md-12">
                                        <input type="tel" value="{{$student->phone_no}}" name="phone_no" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" value="{{$student->email }}" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">Bank Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="bank_name" value="{{$student->bank_name }}" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12">Account No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="account_no" value="{{$student->account_no }}" class="form-control form-control-line">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 ml-auto">
                                <button class="btn waves-effect waves-light btn-primary pull-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        var picker = $("#file-open");
        var fileInput = $("#pic-input");
        var profilePic = $("#profile-pic");
        picker.click(function () {
            fileInput.click();
        });
        fileInput.change(function (ev) {
            var reader = new FileReader();
            reader.onload = function (ev) {
                profilePic.attr("src",ev.target.result);
            };
            reader.readAsDataURL(ev.target.files[0]);
        });





    </script>




@endsection