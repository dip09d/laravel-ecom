<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="Admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="Admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="Admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="Admin/assets/images/favicon.png" />
    <style rel="stylesheet" type="text/css">
        .cate {
            text-align: center;
            padding-top: 35px;  
        }
        .text{
            color: black;
            padding-bottom: 15px;
            margin-top: 10px;
        }
        .label{
            padding-bottom: 15px;
            margin: auto;
            font-family: Georgia, 'Times New Roman', Times, serif
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .desine{
            padding-bottom: 15px;
        }

     
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('Admin.slidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('Admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                        <table class="table text-light my-5">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Details</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">discount_price</th>
                  <th scope="col">Image</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $data)
                <tr>
                  <th scope="row">{{$data->id}}</th>
                  <td>{{$data->title}}</td>
                  <td>{{$data->category->name}}</td>
                  <td>{{$data->desc}}</td>
                  <td>{{$data->quantity}}</td>
                  <td>{{$data->price}}</td>
                  <td>{{$data->discount_price}}</td>
                  <td>
                    <img src="{{asset($data->image)}}" height="50px" width="50px" alt="">
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="Admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="Admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="Admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="Admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="Admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="Admin/assets/js/off-canvas.js"></script>
    <script src="Admin/assets/js/hoverable-collapse.js"></script>
    <script src="Admin/assets/js/misc.js"></script>
    <script src="Admin/assets/js/settings.js"></script>
    <script src="Admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="Admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
