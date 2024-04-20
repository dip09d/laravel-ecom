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
        @include('Vendor.slidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('Vendor.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    
                    <div class="cate">
                        <form method="post" action="{{ route('vendor.profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="desine">
                            <label class="label">Name:-</label>
                            <input type="text" name="name" class="text" value="{{Auth::user()->name}}" >
                         </div>
                         <div class="desine">
                            <label class="label">Email:-</label>
                            <input type="text" name="email" class="text" value="{{Auth::user()->email}}" >
                         </div>
                         <div class="desine">
                            <input type="hidden" name="role" class="text" value="{{Auth::user()->role}}" >
                         </div>
                         <div class="desine">
                            <label class="label">New Image:-</label>
                            <input type="file" name="image" class="text" >
                         </div>
                         <div class="desine">
                            <label class="label">Old Image:-</label>
                            <img src="{{asset(Auth::user()->image)}}" alt="" height="60px" width="60px">
                         </div>
                         <div class="desine">
                            <button type="submit" name="submiy" class="btn btn-primary">Update Profile</button>
                         </div>
                        </form>
                    </div>
                    </div>
                </div>
         </div>
            <!-- main-panel ends -->
     </div>
        <!-- page-body-wrapper ends -->
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
