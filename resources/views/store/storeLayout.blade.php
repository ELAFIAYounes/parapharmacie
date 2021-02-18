<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SHop</title>

    <link rel="shortcut icon" href="{{asset('favicon.png')}}" />
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <link type="text/css" rel="stylesheet" href="{{asset('css/style2.css')}}" />
    
    {{-- custom css --}}
    <style>
        @media only screen and (max-width: 767px){
            #head_links {
                visibility: hidden;
            }
            .custom_search_top {
                text-align:center;
            }

            .header-ctn {
                width: 100%;
            }
        }
        </style>

</head>

<body>
    <header>
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-right">
                    @if(session()->has('user'))
                      <li><a style="color:white" href="{{route('user.history')}}">{{session()->get('user')->full_name}} </a></li>  
                      <li><a href="{{route('user.logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
                    @else
                    <li><a href="{{route('user.login')}}"><i class="fa fa-user-o"></i> Login</a></li>
                    
                    <li><a href="{{route('user.signup')}}"><i class="fa fa-user-o"></i> SignUp</a></li>
                    @endif
                    
                </ul>
            </div>
        </div>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="{{route('user.home')}}" class="logo">
                                <img src="{{asset('img/shop.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="{{route('user.search')}}" method="get">
                                <div class="custom_search_top" >
                                    <input class="input" style="border-radius: 40px 0px 0px 40px;" name="n" placeholder="Search here">
                                    <button  class="search-btn">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <div  class="dropdown">
                                <a class="dropdown-toggle " id="custom_shopping_cart" href="{{route('user.cart')}}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                </a>

                            </div>
                            <div class="menu-toggle pull-right">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav id="navigation">
        <div class="container">
            <div id="responsive-nav">
                <ul class="main-nav nav navbar-nav">
                    <li class="{{Route::is('user.home') ? 'active' : ''}}"><a href="{{route('user.home')}}">Home</a></li>
                    @if(Route::is('user.search'))
                        @foreach($cat as $c)
                        <li class="{{$c->id == $a ? 'active' : ''}}"><a href="{{route('user.search.cat',['id'=>$c->id])}}" >{{$c->name}}</a></li>
                        @endforeach
                        <li class="{{$a == -1  ? 'active' : ''}}"><a href="search">Browse All</a></li>
                    @else
                        @foreach($cat as $c)
                        <li ><a href="{{route('user.search.cat',['id'=>$c->id])}}" >{{$c->name}}</a></li>
                        @endforeach
                        <li ><a href="{{route('user.search')}}">Browse All</a></li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="section">
        <div class="container">
            @if(Route::is('user.home'))
            <div class="row">
                @php
                $counter=0;
                @endphp
                @foreach($cat as $c)
                 @php
                $counter++;
                if($counter==4)
                break;
               
                @endphp
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/shop0{{$index++}}.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{$c->name}}</h3>
                            <a href="search?c={{$c->id}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    @yield('content')
    <div id="newsletter" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" >
        <div class="section">
            <div class="container">
                <div class="row" >
                    <div class="col-md-3 col-xs-6" >
                        <div class="footer" >
                            <h3 class="footer-title">About Us</h3>
                            <p> <strong>Le Web store</strong><br> représente tous les contenus digitaux utilisés en magasin pour améliorer l'expérience client. On parle ... On distingue le « Web in store » du « Web to store », qui désigne l'ensemble des actions et dispositifs utilisés sur Internet pour amener le consommateur dans le point de vente physique.   </p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>Mohammédia, Grand Casablanca.</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+212 520-10-66-80</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>support@shop.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Computer</a></li>
                                <li><a href="#">Headphone</a></li>
                                <li><a href="#">Smartphone</a></li>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Information</h3>
                            <ul class="footer-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </footer>


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/nouislider.min.js')}}"></script>
    <script src="{{asset('js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
    
    

</body>

</html>
