<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/toastr.css')}}">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Campus Fundraiser</title>
</head>
<body>
<header class="navbar-fixed">

    <!-- ====================================  -->
    <!-- Header Navbar Begins -->
    <!-- ===================================== -->
    <nav>
        <div class="nav-wrapper blue">
            <a href="{{url('/')}}" class="brand-logo">Fundraiser</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Home</a></li>
                <li><a href="badges.html">About</a></li>
                <li><a href="collapsible.html">Developer</a></li>
                <li><a href="collapsible.html">Contact</a></li>
                <li><a href="categories.html">Categories</a></li>
            </ul>
        </div>
    </nav>

    <!-- ================================================= -->
    <!-- End Navbar -->
    <!-- ==================================== -->
</header>


<main>

    @yield("contents")






    {{--Payment modal--}}


    <div id="pay-modal" class="modal" style="width: 500px">
        <form  id="pay-form">

            <div class="modal-content">
                <h4>Enter amount</h4>
                <p id="title"></p>
                <div class="input-field">
                    <input type="email" name="pemail" required id="pemail">
                    <label for="pemail">Email</label>
                </div>
                <div class="input-field">
                    <input type="number" name="amount" min="1" required id="amount">
                    <label for="amount">Amount</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-close waves-effect waves-green btn-flat">Cancel</button>
                <button type="submit" class=" waves-effect waves-green btn-flat">Contribute</button>
            </div>
        </form>

    </div>


</main>


@section('scripts')
    <script src="{{ url('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/owl.carousel.min.js')}}"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script src="{{url('js/materialize.min.js')}}"></script>
    <script src="{{url('js/toastr.min.js')}}"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script type="text/javascript">
        M.AutoInit();


        //-------------------------------------------------------------------

        var modal = M.Modal.init(document.querySelector('#pay-modal'));






        $(".pay-btn").click(function (ev) {
            var id = $(ev.target).data('id');
            var name = $(ev.target).data('title');
            $("#title").text(name);
            modal.open();


            $("#pay-form").submit(function (ev) {
                ev.preventDefault();
                var amount = $("input[name='amount']").val();
                var email = $("input[name='pemail']").val();
                modal.close();
                payWithPaystack(id,amount,email);

            });


        });





        function payWithPaystack(id,amount,email){
            var handler = PaystackPop.setup({
                key: 'pk_test_f87a7f0e3d84e696129e7dde5c20b24f0cf671af',
                email: email,
                amount: amount*100,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                metadata: {
                    custom_fields: [
                        {
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                            value: "+2348012345678"
                        }
                    ]
                },
                callback: function(response){
                    // alert('success. transaction ref is ' + response.reference);
                    window.location="{{url('verify-payment')}}/"+id+"/"+amount;
                },
                onClose: function(){
                    // alert('window closed');
                }
            });
            handler.openIframe();
        }

















        //-------------------------------------------

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };





        //-----------------------------------------------



        @if(session('status'))
        @if(session('status')=="success")
        toastr.success("{{session("message")}}");
        @else
        toastr.error("{{session("message")}}");
        @endif
        @endif

    </script>




@show



</body>
</html>