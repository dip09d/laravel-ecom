<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach ($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="my-20">
                     <a href="/wishlist/{{$products->id}}"><i class="fa-solid fa-heart fa-2xl" style="color: #ff0000;"></i></a>
                  </div>
                  <div class="options">
                     <a href="/product_des/{{$products->id}}" class="option1">
                     Buy Now
                     </a>
                     <a href="/product_des/{{$products->id}}" class="option2">
                     Add To Cart
                     </a>
                  </div>
               </div>
              
               <div class="img-box">
                  <img src="{{asset($products->image)}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$products->title}}
                  </h5>
                  @if ($products->discount_price!=null)
                  <h6  style="color: red">
                     ${{$products->discount_price}}
                  </h6>
                  <h5 style="text-decoration: line-through;color:blue">
                     ${{$products->price}}
                  </h5> 
                  @else
                  <h5 style="color: blue">
                     ${{$products->price}}
                  </h5>
                  @endif
               </div>
            </div>
            <h5 style="color: red">
               @if ($products->quantity< 10)
                  Only {{$products->quantity}} products Lefts
               @endif
            </h5>
         </div>  
         @endforeach
         <span style="padding-top: 20px">
           {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
         </span>
      </div> 
    </div>
 </section>