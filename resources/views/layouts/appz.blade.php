<!DOCTYPE html>
<html lang="en">
<head>

    <title>Moka</title>
    <meta charset="UTF-8">

	<link rel="icon" type="image/png" href="images/icons/camera_lens.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">


	<link rel="stylesheet" type="text/css" href="/user_asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="/user_asset/css/main.css">
<!--===============================================================================================-->






<!-- CSS Files -->
<link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />


</head>


<body class="animsition">

	<!-- Header -->
	<header class="header1">
            <!-- Header desktop -->
            <div class="container-menu-header">
                <div class="topbar">
                    <div class="topbar-social">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>

                    <span class="topbar-child1">
                        MOKA
                    </span>


                </div>

                <div class="wrap_header">
                    <!-- Logo -->
                    <!--หมอแก้-->
                    <a href="/" class="logo">
                        <img src="/user_asset/images/icons/mokaLogo3.png" alt="IMG-LOGO">
                    </a>




            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="{{route('showproducts')}}">Products</a>
                            <ul class="sub_menu">
                                @foreach($groups as $group)
                                <li><a href="{{ route('productsWelcome.show', $group->id) }}">
                                    {{$group->group_name}}
                                @endforeach
                                </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('showproducts')}}">Shop</a>
                        </li>

                        <li class="sale-noti">
                            <a href="product.html">Sale</a>
                        </li>

                        <li>
                            <a href="cart.html">Features</a>
                        </li>

                        <li>
                            <a href="blog.html">Blog</a>
                        </li>

                        <li>
                            <a href="about.html">About</a>
                        </li>

                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                 @guest
                        @if (Route::has('login'))
                        <div class="wrap_menu pt-1">
                                <nav class="menu">
                                    <ul class="main_menu">
                                        <li>
                                            <img src="/user_asset/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

                                            <ul class="sub_menu">
                                                <li><a href="{{ route('login') }}">
                                                    Login{{-- <img src="/user_asset/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> --}}
                                                </a>
                                                </li>
                                                <li><a href="{{ route('register') }}">
                                                    Register
                                                </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                    @endguest
                        @else
                            @role('admin')
                            <div class="wrap_menu pt-1">
                                <nav class="menu">
                                    <ul class="main_menu">
                                        <li>
                                            <img src="/user_asset/images/icons/icon-header-03.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

                                            <ul class="sub_menu">
                                                <li><a href={{route('profile.userinfo')}}>
                                                    @foreach($user_detail as $user)
                                                    {{$user->user_firstname}}'s  Profile
                                                    @endforeach
                                                </a></li>
                                                <li><a href="{{route('adminhome')}}">
                                                    Admin Dashboard
                                                </a></li>
                                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                     {{ __('Logout') }}
                                                 </a>

                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                 @csrf
                                                 </form></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            @endrole
                            @role('customer')
                            <div class="wrap_menu pt-1">
                                    <nav class="menu">
                                        <ul class="main_menu">
                                            <li>
                                                <img src="/user_asset/images/icons/icon-header-03.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

                                                <ul class="sub_menu">
                                                    <li><a href="{{route('profile.userinfo')}}">
                                                        Profile
                                                    </a></li>
                                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                         {{ __('Logout') }}
                                                     </a>

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                     @csrf
                                                     </form></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            @endrole
                        @endif

                        <span class="linedivide1"></span>

                        <div class="header-wrapicon2">

                            <img src="/user_asset/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                                <span class="header-icons-noti"> {{Cart::count()}}
                                </span>


                            <!-- Header cart noti -->
                            <div class="header-cart header-dropdown">
                                <ul class="header-cart-wrapitem">
                                @if(Cart::count()==0)
                                    <li class="header-cart-item">
                                        <h1>No items in cart</h1>
                                    </li>

                                @else
                                @foreach(Cart::content() as $product)
                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img">
                                            <img src="/user_asset/images/item-cart-01.jpg" alt="IMG">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="{{ route('productsWelcome2.show', $product->id) }}" class="header-cart-item-name">
                                                {{$product->name}}
                                            </a>

                                            <span class="header-cart-item-info">
                                        ‎        ฿ {{$product->price}} x {{$product->qty}}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach

                                </ul>


                                <div class="header-cart-total align-left">
                                    Total: ฿{{Cart::total()}}
                                </div>
                                @endif



                                <div class="header-cart-buttons">
                                    <!-- Button -->
                                    <a href="{{route('cart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



           	<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="/" class="logo-mobile">
                <img src="/user_asset/images/icons/mokaLogo3.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">


                <!-- Header Icon mobile -->

                <div class="header-icons-mobile">
                 @guest
                        @if (Route::has('login'))
                        <div class="wrap_menu pt-1">
                                <nav class="menu">
                                    <ul class="main_menu">
                                        <li>
                                            <img src="/user_asset/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

                                            <ul class="sub_menu">
                                                <li><a href="{{ route('login') }}">
                                                    Login{{-- <img src="/user_asset/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> --}}
                                                </a>
                                                </li>
                                                <li><a href="{{ route('register') }}">
                                                    Register
                                                </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                    @endguest
                        @else
                            @role('admin')
                            <div class="wrap_menu pt-1">
                                <nav class="menu">
                                    <ul class="main_menu">
                                        <li>
                                            <img src="/user_asset/images/icons/icon-header-03.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

                                            <ul class="sub_menu">
                                                <li><a href={{route('profile.userinfo')}}>
                                                    @foreach($user_detail as $user)
                                                    {{$user->user_firstname}}'s  Profile
                                                    @endforeach
                                                </a></li>
                                                <li><a href="{{route('adminhome')}}">
                                                    Admin Dashboard
                                                </a></li>
                                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                     {{ __('Logout') }}
                                                 </a>

                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                 @csrf
                                                 </form></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            @endrole
                            @role('customer')
                            <div class="wrap_menu pt-1">
                                    <nav class="menu">
                                        <ul class="main_menu">
                                            <li>
                                                <img src="/user_asset/images/icons/icon-header-03.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

                                                <ul class="sub_menu">
                                                    <li><a href="{{route('profile.userinfo')}}">
                                                        Profile
                                                    </a></li>
                                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                         {{ __('Logout') }}
                                                     </a>

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                     @csrf
                                                     </form></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            @endrole
                        @endif

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">

                    <img src="/user_asset/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti"> {{Cart::count()}}
                        </span>



						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">

                            @if(Cart::count()==0)
                                    <li class="header-cart-item">
                                        <h1>No items in cart</h1>
                                    </li>

                            @else
                            @foreach(Cart::content() as $product)

								<li class="header-cart-item">
                                <div class="header-cart-item-img">
                                            <img src="/user_asset/images/item-cart-01.jpg" alt="IMG">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="{{ route('productsWelcome2.show', $product->id) }}"  class="header-cart-item-name">
                                                {{$product->name}}
                                            </a>

                                            <span class="header-cart-item-info">
                                        ‎        ฿ {{$product->price}} x {{$product->qty}}
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>


                                <div class="header-cart-total align-left">
                                    Total: ฿{{Cart::total()}}
                                </div>
                                @endif


                                <div class="header-cart-buttons">
                                    <!-- Button -->
                                    <a href="{{route('cart')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							MOKA
						</span>
					</li>



					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
                        <a href="http://localhost:8000/showproducts">Products</a>
                            <ul class="sub_menu">
                                                                <li><a href="http://localhost:8000/productsWelcome/1">
                                    Random
                                                                </a></li><li><a href="http://localhost:8000/productsWelcome/2">
                                    Misc
                                                                </a></li><li><a href="http://localhost:8000/productsWelcome/3">
                                    Food
                                                                </a></li><li><a href="http://localhost:8000/productsWelcome/4">
                                    Camera
                                                                </a></li><li><a href="http://localhost:8000/productsWelcome/5">
                                    Numbers
                                                                </a></li><li><a href="http://localhost:8000/productsWelcome/6">
                                    Test
                                                                </a></li>
                            </ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
                        <a href="http://localhost:8000/showproducts">Shop</a>
					</li>

					<li class="item-menu-mobile">
                        <a href="product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
                        <a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
                        <a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
                        <a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
@yield('content')
<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="/user_asset/images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="/user_asset/images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="/user_asset/images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="/user_asset/images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="/user_asset/images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
    </footer>




	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>




<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				// swal(nameProduct, "Added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				// swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				// swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
