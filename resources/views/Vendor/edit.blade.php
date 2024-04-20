<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                        <h2 class="h2">Product Update</h2>
                        <form action="/update/{{$id->id}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="desine">
                                <label>Category</label>
                                <select name="category_id" id="" >
                                    <option value="">....</option>
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}" {{$id->category_id==$data->id ? 'selected':''}}>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="desine">
                           <label class="label">Title:-</label>
                           <input type="text" name="title" class="text" value="{{$id->title}}">
                           @if ($errors->has('title'))
                            <code>{{$errors->first('title')}}</code>    
                            @endif
                        </div>
                        <div class="desine">
                            <label class="label">Description:-</label>
                            <input type="text" name="desc" class="text" value="{{$id->desc}}">
                            @if ($errors->has('desc'))
                            <code>{{$errors->first('desc')}}</code>    
                            @endif
                         </div>
                         <div class="desine">
                            <label class="label">Quantity:-</label>
                            <input type="number" name="quantity" min="0" class="text" value="{{$id->quantity}}">
                            @if ($errors->has('quantity'))
                            <code>{{$errors->first('quantity')}}</code>    
                            @endif
                         </div>
                         <div class="desine">
                            <label class="label">price:-</label>
                            <input type="number" name="price" class="text" value="{{$id->price}}">
                            @if ($errors->has('price'))
                            <code>{{$errors->first('price')}}</code>    
                            @endif
                         </div>
                         <div class="desine">
                            <label class="label">Discount_price:-</label>
                            <input type="number" name="discount_price" class="text" value="{{$id->discount_price}}">
                            @if ($errors->has('discount_price'))
                            <code>{{$errors->first('discount_price')}}</code>    
                            @endif
                         </div>
                         <div class="desine">
                            <label class="label">image:-</label>
                            <input type="file" name="image" class="text">
                            @if ($errors->has('image'))
                            <code>{{$errors->first('image')}}</code>    
                            @endif
                         </div>
                         <div class="desine">
                            <img src="{{asset($id->image)}}" height="50px" width="50px" alt="">
                         </div>
                         <div>
                            <button class="btn btn-info" type="submit" name="submit">Update Product</button>   
                              
                         </div>
                        </form>
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
