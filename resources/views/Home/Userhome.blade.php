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
         <!-- end header section -->
         <!-- slider section -->
        @include('Home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
       @include('Home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
    @include('Home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
     @include('Home.product')
      <!-- end product section -->

      <div style="padding-bottom: 30px; text-align:center">
           <h1 style="font-size: 30px; padding-bottom:20px; padding-top:20px; text-align:center" >Comments</h1>
           <form action="">
            <textarea name="comment something here" style="height: 150px; width:600px;"></textarea>
            <br>
            <a href="" class="btn btn-info">Submit</a>
           </form>
      </div>

      <!-- subscribe section -->
      @include('Home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
     @include('Home.client')
      <!-- end client section -->
      <!-- footer start -->
     @include('Home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
             var scrollpos = localStorage.getItem('scrollpos');
             if (scrollpos) window.scrollTo(0, scrollpos);
         });
 
         window.onbeforeunload = function(e) {
             localStorage.setItem('scrollpos', window.scrollY);
         };
     </script>
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