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
    <style>
        .container {
            display: flex;
        }

        .add {
            text-align: center;
        }

        .card1 {}
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('Home.header')
        <!-- end header section -->
        
        <div class="container">
            <div class="">
                @if (session('message'))
                    <h5 class="alert alert-info">{{ session('message') }}</h5>
                @endif
                @if (session('order'))
                <h5 class="alert alert-success">{{ session('order') }}</h5>
            @endif
            </div>
            <div class="card1" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="add">Identy</h4>
                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    <h5 class="card-title">{{ Auth::user()->email }}</h5>
                    <h5 class="card-title">{{ Auth::user()->phone }}</h5>
                </div>
            </div>
            {{-- <div class="card1" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="add">Address</h4>
                    <h5 class="card-title">{{ $address->city }}</h5>
                    <h5 class="card-title">{{ $address->state }}</h5>
                    <h5 class="card-title">{{ $address->landmark }}</h5>
                    <h5 class="card-title">{{ $address->zip }}</h5>
                </div>
            </div> --}}
        </div>

        <div class="container">
            <table class="table" style="margin-top: 10px">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                    <?php $total_price = 0; ?>
                </thead>
                <tbody>
                    @foreach ($cart as $data)
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <img src="{{ asset($data->image) }}" alt="" height="70px" width="80px">
                            </td>
                            <td>{{ $data->product_tital }}</td>
                            <td>${{ $data->price }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>
                                <a href="" class="btn btn-success btn-sm">Buy Now</a>
                                <a href="/cart_update/{{ $data->id }}" class="btn btn-primary btn-sm">Update</a>
                                <a href="/cart_delete/{{ $data->id }}"
                                    onclick="return confirm('Are You Sure Remove This Item ?')"
                                    class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                        <?php $total_price = $total_price + $data->price; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="div">
                <h3>Total Price=${{ $total_price }}</h3>
            </div>
        </div>
        <div class="container">
            <h4>Proceed To Order</h4>

            <a href="{{ route('cart.order') }}" class="btn btn-info ml-5">Cash On Delivary</a>
            <form action="{{route('paidorder.user')}}" method="GET">
               @csrf
                <input type="hidden" value="{{ $total_price }}" name="total_price">
                <button class="btn btn-primary ml-5" type="submit" name="submit">Prepaid Delivary</button>
            </form>
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
