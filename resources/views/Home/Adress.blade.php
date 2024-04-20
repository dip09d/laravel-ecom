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

        <div class="container">
            @if (session('message'))
                <h3 class="alert alert-info">{{ session('message') }}</h3>
            @endif
            <div class="card-body">
                <h3>Adress</h3>
            </div>

                <div class="col-md-4">
                    <label for=""class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" readonly>
                </div>
                <div class="col-md-4">
                    <label for=""class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" readonly>
                </div>
                
            <form action="{{route('user.store_address')}}" method="POST">
                @csrf
                <div class="col-md-4">
                    <label for=""class="form-label">city</label>
                    <input type="text" class="form-control" name="city" value="{{Auth::user()->address->city}}">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" class="form-select" name="state">
                        <option selected value="{{Auth::user()->address->landmark}}">Choose...</option>
                        <option>West Bangel</option>
                        <option>Bihar</option>
                        <option>Mumbai</option>
                        <option>Delhi</option>
                        <option>Napal</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">landmark</label>
                    <input type="text" name="landmark" class="form-control" value="{{Auth::user()->address->landmark}}"> 
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">zip</label>
                    <input type="text" name="zip" class="form-control" value="{{Auth::user()->address->zip}}">
                </div>
                @if ($user->address!=null)
                <div class="col-md-4">
                    <button name="submit" type="submit" class="btn btn-primary">Update Adress</button>
                </div>
                @else
                <div class="col-md-4">
                    <button name="submit" type="submit" class="btn btn-primary">Add Adress</button>
                </div>
                @endif
            </form>
        </div>
    </div>
    <!-- why section -->

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
