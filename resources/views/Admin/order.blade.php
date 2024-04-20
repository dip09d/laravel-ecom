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
<div class="">
    <h3>Order List</h3>
    <div style="padding-bottom: 30px; padding-left:400px;">
      <form action="{{route('admin.searchorder')}}" method="GET">
        @csrf
        <input type="text" name="search">
        <button type="submit" name="submit" class="btn btn-info">Search</button>
      </form>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Payment</th>
            <th scope="col">Delivery</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            <th scope="col">Print</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($orders as $orders)
            <tr>
                <th>{{$orders->id}}</th>
                <td>{{$orders->name}}</td>
                <td>{{$orders->email}}</td>
                <td>{{$orders->phone}}</td>
                <td>{{$orders->product_tital}}</td>
                <td>{{$orders->price}}</td>
                <td>{{$orders->quantity}}</td>
                <td>{{$orders->payment_status }}</td>
                <td>{{$orders->delivery_status }}</td>
                <td>
                    <img src="{{asset($orders->image)}}" alt="" height="80px" width="80px">
                </td>
                <td>
                    @if ($orders->delivery_status=="Delivered")
                    <p class="text-success">delivered</p>
                    @else
                    <a href="delivered/{{$orders->id}}" onclick="return confirm('are you sure this product is delivered!!!')" class="btn btn-danger btn-sm">Delivered</a>
                    @endif
                   
                </td>
                <td>
                    @if ($orders->delivery_status=="Delivered")
                    <a href="/print_pdf/{{$orders->id}}" class="btn btn-primary">Print</a>
                    @else
                    
                    @endif
                </td>
              </tr> 
              @empty
      <tr>
        <td colspan="16">
          NO DATA FOUNDED
        </td>
      </tr>
            @endforelse
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