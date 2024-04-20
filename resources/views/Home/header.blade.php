<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{route('main')}}">MALL</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{route('main')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{route('all_product')}}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('user.my_order')}}">My Order</a>
               </li>
                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{route('user.profile')}}" class="btn btn-info
                  ">Profile</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('user.adress')}}">Address</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('product.show_cart')}}">Cart</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('home.wishlists')}}">Wishlist</a>
                  </li>
                     <li class="nav-item">
                     <!-- Authentication -->
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                         this.closest('form').submit();" class="btn btn-info
                         ">logout</a>
                     </form>
                 
               </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}" class="btn btn-info
                  ">Log In</a>
               </li>
               @if (Route::has('register'))
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}" class="btn btn-danger">Register</a>
               </li>
                 @endif
               @endauth
               @endif
             </ul>
          </div>
       </nav>
    </div>
 </header>