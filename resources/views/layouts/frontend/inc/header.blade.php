 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center">
     <div class="container d-flex align-items-center">

         <h1 class="logo me-auto"><a href="/home">Sailor</a></h1>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

         <nav id="navbar" class="navbar">
             <ul>
                 @php
                     $menus = App\Models\Menu::where('status', '0')->get();
                     
                     //  $categories = App\models\Category::where('navbar_status', '0')
                     //      ->where('status', '0')
                     //      ->get();
                     
                 @endphp
                 {{-- <li><a href="{{ url('/') }}" class="active">Home</a></li> --}}
                 @foreach ($menus as $menu)
                     <li><a href="{{ url($menu->menu_slug) }}">{{ $menu->menu_name }}</a></li>
                 @endforeach


                 {{-- <li><a href="{{ url('/') }}" class="getstarted">Get Started</a></li> --}}
             </ul>
             <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

     </div>
 </header><!-- End Header -->
