<!
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login| Campus Fundraiser</title>

    <style>

        *{
            font-family: sans-serif;
        }
        h1 {
            height: 100px;
            width: 100%;
            font-size: 28px;
            background: #03A9F4;
            color: white;
            text-align: center;
            line-height: 150%;
            border-radius: 3px 3px 0 0;
            box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);
        }

        form {
            box-sizing: border-box;
            width: 360px;
            margin: 100px auto 0;
            box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
            padding-bottom: 40px;
            border-radius: 3px;
        }
        form h1 {
            box-sizing: border-box;
            padding: 20px;
        }

        input {
            margin: 40px 25px;
            width: 300px;
            display: block;
            border: none;
            padding: 10px 0;
            border-bottom: solid 1px #03A9F4;
            -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
            transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
            background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #03A9F4 4%);
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #03A9F4 4%);
            background-position: -300px 0;
            background-size: 300px 100%;
            background-repeat: no-repeat;
            color: #03A9F4;
        }
        input:focus, input:valid {
            box-shadow: none;
            outline: none;
            background-position: 0 0;
        }
        input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
            color: #03A9F4;
            font-size: 11px;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            visibility: visible !important;
        }

        button {
            border: none;
            background: #03A9F4;
            cursor: pointer;
            border-radius: 3px;
            padding: 6px;
            width: 300px;
            color: white;
            margin-left: 25px;
            box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
        }
        button:hover {
            -webkit-transform: translateY(-3px);
            -ms-transform: translateY(-3px);
            transform: translateY(-3px);
            box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
        }


        input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
            color: #03A9F4;
            font-size: 11px;
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
            visibility: visible !important;
            z-index: 5000;
        }
    </style>
</head>
<body>


   <div class="form">
       <div class="wrapper">
           <form action="{{route('admin.login')}}" method="post">
               @csrf

               <h1>Campus Fundraiser Admin Login</h1>
               <input placeholder="Username" name="username" type="text" required="">
               <input placeholder="Password" name="password" type="password" required="">
               <button>Login</button>
           </form>
       </div>
   </div>


</body>
</html>