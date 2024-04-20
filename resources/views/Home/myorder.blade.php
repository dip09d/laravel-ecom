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
         <div class="">
            <div class="container">
                <h3 class="text-success">My Order</h3>
                <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Tital</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                        <th scope="col">payment_status </th>
                        <th scope="col">delivery_status </th>
                        <th scope="col">image</th>
                        <th scope="col">Cancel Order </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($myorder as $order)
                        <tr>
                            <th scope="row">{{$order->product_tital}}</th>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                <img src="{{asset($order->image)}}" height="70px" width="80px" alt="">
                            </td>
                            <td>
                                @if ($order->delivery_status=='panding')
                                <a href="/cancel_order/{{$order->id}}" class="btn btn-danger btn-sm">Cancel Order</a>
                                @else
                                 <p class="text-success">Not Allowed</p>
                                @endif
                                
                            </td>
                          </tr>  
                        @endforeach
                    </tbody>
                  </table>
            </div>
         </div>
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