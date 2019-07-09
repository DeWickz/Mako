<!DOCTYPE html>
<html lang="en">
<head>

		<title>Details</title>
		<meta charset="UTF-8">

	<link rel="icon" type="image/png" href="/user_asset/images/icons/camera_lens.png"/>
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
<body class="animsition bgwhite">
<br/>
<br/>
<br/>
<br/>
<br/>

<header class="header1">
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
						<a href="showproducts">Products</a>
						<ul class="sub_menu">
                            @foreach($groups as $group)
							<li><a href="{{ route('productsWelcome.show', $group->id) }}">
                                {{$group->group_name}}
                            @endforeach
                            </a></li>

						</ul>
					</li>

					<li>
						<a href="product.html">Shop</a>
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
                                            <li><a href="{{route('profile')}}">
                                                @foreach($user_detail as $user)
                                                {{$user->user_firstname}}'s  Profile
                                                @endforeach
                                            </a></li>
                                            <li><a href="adminhome">
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
                                            <li><a href="profile">
                                                @foreach($user_detail as $user)
                                                {{$user->user_firstname}}'s  Profile
                                                @endforeach
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
                        <a href="{{route('shoppingCart')}}">
                        <img src="/user_asset/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                            <span class="header-icons-noti">{{Session::has('cart') ?
                            Session::get('cart')->totalQty : ''}}
                            </span>
                        </a>

						<!-- Header cart noti -->
						{{-- <div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/user_asset/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/user_asset/images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/user_asset/images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="/user_asset/images/icons/mokaLogo3.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="{{ route('login') }}" class="header-wrapicon1 dis-block">
						Login{{-- <img src="/user_asset/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> --}}
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="/user_asset/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/user_asset/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/user_asset/images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="/user_asset/images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

            {{-- <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div> --}}
        </div>
    </div>


<br/>
<br/>
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdaFfiqB1c_khvdG-FYkPG4xyD2VWmBFnP19hweJ49GRdo26wQ">
							<div class="wrap-pic-w">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdaFfiqB1c_khvdG-FYkPG4xyD2VWmBFnP19hweJ49GRdo26wQ" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="https://blog.nmai.si.edu/.a/6a01156f5f4ba1970b0167621a2ed8970b-200wi">
							<div class="wrap-pic-w">
								<img src="https://blog.nmai.si.edu/.a/6a01156f5f4ba1970b0167621a2ed8970b-200wi" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="https://fbi.dek-d.com/27/0614/4561/122963548">
							<div class="wrap-pic-w">
								<img src="https://fbi.dek-d.com/27/0614/4561/122963548" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
                @foreach($products as $product)
				{{$product->product_name}}
				</h4>

				<span class="m-text17">
				฿ {{$product->product_price}}
				</span>
                @endforeach
				<p class="s-text8 p-t-10">
					Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<!-- <div class="s-text15 w-size15 t-center">
							Size
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								<option>Size S</option>
								<option>Size M</option>
								<option>Size L</option>
								<option>Size XL</option>
							</select>
						</div> -->
					</div>

					<div class="flex-m flex-w">
						<!-- <div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								<option>Gray</option>
								<option>Red</option>
								<option>Black</option>
								<option>Blue</option>
							</select>
						</div> -->
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>
							<br>
							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    @foreach($products as $product)
                                    <a href="{{route('addtocart', $product->id)}}" style="color:white">Add to Cart</a>
                                    @endforeach
								</button>
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="p-b-45">
					<span class="s-text8 m-r-35">SKU: MUG-01</span>
					<span class="s-text8">Categories: Mug, Design</span>
				</div> -->

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							pareparepareparepareparepare
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>


				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-100">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					New Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                    @foreach($relatedproducts as $product)
					<div class="item-slick2 p-l-8 p-r-8">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="images/item-02.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
										 <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>
										<div class="block2-btn-addcart w-size1 trans-0-4">

                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                <a href="{{ route('productsWelcome2.show', $product->id) }}", style="color:white">
                                                    View details
                                                </a>
                                            </button>
										</div>
									</div>
								</div>


							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                    {{$product->product_name}}
								</a>

								<span class="block2-price m-text6 p-r-5">
                                    ฿ {{$product->product_price}}
								</span>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
		</div>
    </section>


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
        });

        // $(this).on('click', function(){
		// 		swal(nameProduct, "is added to cart !", "success");
		// 	});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
        });

        $('.block2-btn-empty').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

