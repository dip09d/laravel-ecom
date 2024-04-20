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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('Home.header')
      <div class="container">
        @if (session('order'))
            <h5 class="alert alert-success">{{session('order')}}</h5>
        @endif
        @if (session('cancel'))
            <h5 class="alert alert-danger">{{session('cancel')}}</h5>
        @endif
        <div class="card" style="width: 40rem;">
            <h3 class="alert alert-info">All Are Accept Pyment Mood In Our App</h3>
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Total Payable Amount<h5 class="card-title">{{$total_price}}</h5></p>
              <form action="{{route('paypal.payment')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$total_price}}" name="total_price">
                <button type="submit" name="submit"><i class="fa-brands fa-cc-paypal fa-lg" style="color: #0011ff;"></i></i></button>
              </form>
              <div class="mt-3">
              <form action="{{route('payment.stripe')}}" method="POST">
               @csrf
               <input type="hidden" value="{{$total_price}}" name="total_price">
               <button type="submit" name="submit"><i class="fa-brands fa-cc-stripe fa-2xl" style="color: #24dbd8;"></i></button>
             </form>
            </div>
            </div>
          </div>
      </div>
      </div> 
      <!-- footer start -->
     @include('Home.footer')
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