<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order_Details</title>
    <style rel="stylesheet" type="text/css">
     .mian{
        text-align: center;
     }
    </style>
</head>
<body>
    <div class="container">
        <h4 class="main">Order Details</h4>
        <br>
        <br>
        <div class=""></div>
        Customer Name:- <h3>{{$order->name}}</h3>
    </div>
        Customer Email:- <h3>{{$order->email}}</h3>
        Customer Phone:- <h3>{{$order->phone}}</h3>
        Customer Id:- <h3>{{$order->user_id}}</h3>
        Product Name:- <h3>{{$order->product_tital}}</h3>
        Product price:- <h3>{{$order->price}}</h3>
        Product quantity:- <h3>{{$order->quantity}}</h3>
        Product Image:- 
        <br><br>
        <img src="public/images/{{$order->image}}" height="80px" width="80px" alt="">
        
    </div>
</body>
</html>