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
      <!-- product section -->

      <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Our <span>products</span>
              </h2>
           </div>
           <div class="">
            <form action="{{route('product_search')}}" method="GET">
                @csrf
                <input type="text" style="width: 300px; margin-left:400px;" name="product_search" id="Search" placeholder="Search">
                <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </form>
           </div>
           <div class="row">
             @foreach ($product as $products)
             <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                   <div class="option_container">
                      <div class="my-20">
                         <a href="/wishlist/{{$products->id}}"><i class="fa-solid fa-heart fa-2xl" style="color: #ff0000;"></i></a>
                      </div>
                      <div class="options">
                         <a href="" class="option1">
                         Buy Now
                         </a>
                         <a href="/product_des/{{$products->id}}" class="option2">
                         Add To Cart
                         </a>
                      </div>
                   </div>
                  
                   <div class="img-box">
                      <img src="{{asset($products->image)}}" alt="">
                   </div>
                   <div class="detail-box">
                      <h5>
                         {{$products->title}}
                      </h5>
                      @if ($products->discount_price!=null)
                      <h6  style="color: red">
                         ${{$products->discount_price}}
                      </h6>
                      <h5 style="text-decoration: line-through;color:blue">
                         ${{$products->price}}
                      </h5> 
                      @else
                      <h5 style="color: blue">
                         ${{$products->price}}
                      </h5>
                      @endif
                   </div>
                </div>
                <h5 style="color: red">
                   @if ($products->quantity<=10)
                      Only {{$products->quantity}} products Lefts
                   @endif
                </h5>
             </div>  
             @endforeach
             {{-- <span style="padding-top: 20px">
               {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
             </span> --}}
          </div> 
        </div>
     </section>
      <!-- end product section -->

      
      <!-- subscribe section -->
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script>
   
      
      </script>
   </body>
</html>