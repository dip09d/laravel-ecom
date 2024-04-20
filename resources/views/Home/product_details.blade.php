<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
      <style>
        .card-body{

      }
.container .right_side{
    position: relative;
   
    padding: 40px;
}
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('Home.header')
         <!-- end header section -->
         <div class="container" style="margin-top: 80px">
         <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
             
                <div class="card-body">
                    <div class="img-box">
                        <img src="{{asset($id->image)}}" alt="" height="300px" height="300px">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$id->title}}
                        </h5>
                        @if ($id->discount_price!=null)
                        <h5  style="color: blue">
                           ${{$id->discount_price}}
                        </h5>
                        @else
                        <h5 style="color: blue">
                           ${{$id->price}}
                        </h5>
                        @endif
                     </div>
                </div>
              
            </div>
            <div class="col-md-6 grid-margin stretch-card">
          
                <div class="card-body">
                 <h4>Description</h4>
                 <h6>{{$id->desc}}</h6>
                 <br>
                 <h4>Quentity</h4>
                 <form action="/add_cart/{{$id->id}}" method="POST">
                  @csrf
                 <div class="">
                    <input type="number" name="quantity" value="1" min="1">
                 </div>
                 <div class="detail-box">
                  @if ($id->discount_price!=null)
                  <input type="text" value="{{$id->discount_price}}" name="price" style="color: blue">
                  @else
                  <input type="text" value="{{$id->price}}" name="price" style="color: blue;" readonly>
                  @endif
               </div>
                 <div style="margin-top: 10px;">
                    <button type="submit" name="submit" class="btn btn-primary">Add To Cart</button>
                 </div>
               </form>
                </div>
              
            </div>
          </div>
        </div>
     
     </div>  
     
    
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