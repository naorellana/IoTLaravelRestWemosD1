<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <title>IoT 10x Informatica</title>
   <meta content="Admin Dashboard" name="description" />
   <meta content="Themesbrand" name="author" />
   <link rel="shortcut icon" href="{{ asset('imgs/icons/iot.svg')}}">

   <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{ asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
   <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

<!-- Background -->
<div class="account-pages"></div>
<!-- Begin page -->
<div class="wrapper-page">

   <div class="card">
     @yield('content')
   </div>

   <div class="m-t-40 text-center">
       <p class="text-white-50">No tiene una Cuenta? <a href="{{url('register')}}" class="text-white"> Registrate Ahora </a> | <a href="{{url('login')}}" class="text-white">   ingresa a tu cuenta</a> </p>
   <p class="text-muted">© 2020 Derechos Reservados <a href="{{url('http://tenxprotocol.com')}}"> <img src="{{ asset('imgs/tenex-informatica.png') }}" alt="" height="20px"> </a></p>
   <p class="text-muted">Desarollado por <a href="{{url('http://10x.org/')}}"> 10X Informatica </a></p>
   </div>

</div>

<!-- END wrapper -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>

<script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>
