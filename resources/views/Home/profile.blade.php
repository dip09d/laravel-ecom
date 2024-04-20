<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('Home.header')
         <!-- end header section -->
<div class="container">
    <div class="row">
   
            <div>
                <img src="{{asset(Auth::user()->imgae)}}" alt="" width="150px" height="120px">
            </div>
            <div class="card-body">
                <h3>Name:-<h2 class="text-danger">{{Auth::user()->name}}</h2></h3>
                <br>
                <h3>Email:-<h2 class="text-danger">{{Auth::user()->email}}</h2></h3>
                <br>
                <h3>Phone:-<h2 class="text-danger">{{Auth::user()->phone}}</h2></h3>
                <br>
                <h3>Username:-<h2 class="text-danger">{{Auth::user()->username}}</h2></h3>
                <br>
                <a href="" class="btn btn-primary">Update Profile</a>
            </div>
        
    </div>
</div>
      <!-- footer start -->
     
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>