<!DOCTYPE html>
<html>
<head>
<title>list</title>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
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
<div class="container">
    <div class="row">
    <h2>Search Customer Total Data : <span id="total_records"></span></h2>
    <div class="col-12">
        <div class="form-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
            <thead>
                <tr styele="color:white">
                <th>title</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount_price</th>
                </tr>
            </thead>
            <tbody></tbody>
            </table>
        </div>
    </div>    
    </div>
</div>
<script>
$(document).ready(function(){
 
    fetch_customer_data();
 
    function fetch_customer_data(query = '')
    {
        $.ajax({
            url:"{{url('/action')}}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
               console.log('data');
                // $('#data').text(data.total_data);
            }
        })
    }
 
    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
</script>
<script src="Vendor/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="Vendor/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="Vendor/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="Vendor/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="Vendor/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="Vendor/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="Vendor/assets/js/off-canvas.js"></script>
    <script src="Vendor/assets/js/hoverable-collapse.js"></script>
    <script src="Vendor/assets/js/misc.js"></script>
    <script src="Vendor/assets/js/settings.js"></script>
    <script src="Vendor/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="Vendor/assets/js/dashboard.js"></script>
</body>
</html>