@extends("guest.master")
@section("contents")

    <!-- ================= Welcome section Starts here ==================== -->
    <div class="slider">
        <div class="overlay">
            <div class="welcome container">
                <h1 >Welcome To ABU campus fundraiser</h1>
                <p class="typed">Lend a helping hand to other students in need</p>
                <div class="actions">
                    <div class="buttons">
                        <button data-target="signin" class="btn waves-effect btn-large modal-trigger">Sign In</button>
                        <button  data-target="signup" class="btn waves-effect btn-large blue  modal-trigger">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
        <div class="item">
                <img src="{{url('images/clasp.jpg')}}">
            </div>
            <div class="item">
                <img src="{{url('images/slide1.jpg')}}">
            </div>
            <div class="item">
                <img src="{{url('images/hand.jpg')}}">
            </div>
            <div class="item">
                <img src="{{url('images/slide2.jpg')}}">
            </div>
        </div>
    </div><!-- ===============Welcome section ends -->


    <!-- ================ Campaigns section  starts ========================-->

    <div class="campaigns container">
       @include('guest.campaignList')
        <div class="center-align">
            <a href="{{url("/campaigns")}}" class="btn waves-effect blue btn-large">View All Campaigns</a>
        </div>
    </div> <!-- =================Campaigns ends ======================== -->

    <!-- ================== Sign In Modal starts -->
    <div id="signin" class="modal">
        <form method="post" action="{{route('student.login')}}">
            @csrf
            <div class="modal-content">
                <h4>Sign In</h4>
                <div>
                    <div class="input-field">
                        <input type="email" name="email" id="email2">
                        <label for="email2">Email </label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="password" id="password2">
                        <label for="password2">Password </label>
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn red waves-effect modal-close red">Cancel</button>

                <button type="submit" class="btn red waves-effect modal-close blue">Sign In</button>

            </div>
        </form>
    </div><!-- ===================Sign In modal ends -->


    <!-- ==================== Sign up Modal starts here -->
    <div id="signup" class="modal modal-fixed-footer">
        <form method="post" enctype="multipart/form-data" action="{{route('register')}}">
            {{csrf_field()}}
            <div class="modal-content">
                <h4>Sign Up</h4>
                <div>
                    <div class="form">
                        <div class="row">
                            <div class="col m4">


                                <div  title="Upload profile picture" style="max-height: 200px; overflow: hidden">
                                    <img id="avatar" src="images/avatar.png" class="responsive-img">
                                </div>
                                <input type="file" id="profile_pic" accept="image/*" name="profile_picture" style="display: none">

                            </div>
                            <div class="col m8">
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field">
                                            <input type="text" name="first_name" id="first-name" required>
                                            <label for="first-name">First Name </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field">
                                            <input type="text" name="middle_name" id="middle-name" required>
                                            <label for="middle-name">Middle Name </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field">
                                            <input type="text" name="last_name" id="last-name" required>
                                            <label for="first-last">Last Name </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <p style="line-height: 0"><label>Gender</label></p>
                                        <label>
                                            <input name="gender" value="Male" type="radio" checked required/>
                                            <span>Male</span>
                                        </label>
                                        <label>
                                            <input name="gender" value="Female" type="radio" checked required/>
                                            <span>Female</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">


                            <div class="col m3">
                                <div class="input-field">
                                    <input type="text" name="email" id="email" required>
                                    <label for="email">Email  </label>
                                </div>
                            </div>

                            <div class="col m3">
                                <div class="input-field">
                                    <input type="text" name="phone_no" id="phone-no" required>
                                    <label for="phone-no">Phone No. </label>
                                </div>
                            </div>

                            <div class="col m3">
                                <div class="input-field">
                                    <input type="text" name="registration_no" id="reg-no" required>
                                    <label for="reg-no">Registration No. </label>
                                </div>
                            </div>


                            <div class="col m3">
                                <div class="input-field">
                                    <input type="text" name="department" id="department" required>
                                    <label for="department">Department </label>
                                </div>
                            </div>

                            <div class="col m4">
                                <div class="input-field">
                                    <input type="text" name="level" id="level" required>
                                    <label for="level">Level </label>
                                </div>
                            </div>
                            
                            

                            <div class="col m4">
                                <div class="input-field">
                                    <input type="password" name="password" id="password" required>
                                    <label for="password">Password </label>
                                </div>
                            </div>
                            <div class="col m4">
                                <div class="input-field">
                                    <input type="password" name="confirm_password" id="confirm-password" required>
                                    <label for="confirm-password">Confirm Password </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red waves-effect modal-close red">Cancel</button>

                <button type="submit" class="btn red waves-effect blue">Register</button>


            </div>
        </form>
    </div><!-- ==================== Sign up modal ends ========================== -->

@endsection


@section('scripts')
    @parent

    <script>

        $('.owl-carousel').owlCarousel({
            items:1,
            loop:true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoHeight:true,
            autoplay:true,
            autoplayTimeout:2000,
        });



        //---------------------------------------------------
        var avatar = document.getElementById("avatar");
        var profilePic = document.getElementById("profile_pic");

        avatar.onclick = function(){
            profilePic.click();
        };

        profilePic.onchange = function(e){
            var file = e.target;
            if(file.files.length>0) {
                var reader = new FileReader();
                reader.onload = function (ev) {
                    avatar.src = ev.currentTarget.result;
                }
                reader.readAsDataURL(file.files[0])
            }

        };



        @if(session('password_error'))
        toastr.error('Password mismatch');
        @endif




    </script>


@endsection