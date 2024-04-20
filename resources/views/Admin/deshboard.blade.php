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
                <div class="row">
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-9">
                              <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{$product}}</h3>
                                
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                              </div>
                            </div>
                          </div>
                          <h6 class="text-muted font-weight-normal">Total Product</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-9">
                              <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">${{$total_price}}</h3>
                                
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="icon icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                              </div>
                            </div>
                          </div>
                          <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-9">
                              <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{$order}}</h3>
                                
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="icon icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                              </div>
                            </div>
                          </div>
                          <h6 class="text-muted font-weight-normal">Total Order</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-9">
                              <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{$user}}</h3>
                               
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                              </div>
                            </div>
                          </div>
                          <h6 class="text-muted font-weight-normal">Total Customer</h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                  <h3 class="mb-0">{{$delivered}}</h3>
                                 
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="icon icon-box-success ">
                                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                              </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Order Delivered</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                  <h3 class="mb-0">{{$panding}}</h3>
                                  
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="icon icon-box-success ">
                                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                              </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Order Panding</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                  <h3 class="mb-0">{{$today_order}}</h3>
                                 
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="icon icon-box-success ">
                                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                              </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Today Order</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                  <h3 class="mb-0">{{$today_Revenue}}</h3>
                                 
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="icon icon-box-success ">
                                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                              </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Today Sell</h6>
                          </div>
                        </div>
                      </div>
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