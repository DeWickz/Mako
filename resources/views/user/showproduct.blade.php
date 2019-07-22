<link rel="icon" type="image/png" href="/user_asset/images/icons/camera_lens.png"/>
@extends('layouts.appz')
@section('content')

<body class="animsition bgwhite">
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
                @foreach($allproducts as $product)
				{{$product->product_name}}
				</h4>

				<span class="m-text17">
				฿ {{$product->product_price}}
				</span>

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
							{{-- <div class="btn-addcart-product-detail flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div> --}}
                            <br>
                            <form action="{{route('cart.add')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="flex-r-m flex-w p-t-12">
                                <div class="w-size160 flex-m flex-w">
                                    <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                        <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                            <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                            <input class="size8 m-text18 t-center num-product" type="text" title="Qty" name="qty" value="1">
                                        <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                          <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                    <button class="btn btn-medium">
                                        <span class="text">Add to Cart</span>
                                        <i></i>
                                        <span class="semicircle"></span>
                                    </button>
                                    </div>
                                </div>
                            </form>
                    @endforeach
{{--
                                <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                        <input class="size8 m-text18 t-center num-product" type="number" id="Quantity" name="qty" value="1">
                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <button class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                    <!-- Button -->
                                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="{{route('addtocart', $product->id)}}">
                                        @foreach($allproducts as $product)
                                        <a href="{{route('addtocart', $product->id)}}" style="color:white">Add to Cart</a>
                                        @endforeach
                                    </button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                </button> --}}





                            {{-- Add to cart and Buy Now button --}}
							{{--
                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10 pl-3">
                                <!-- Button -->
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="{{route('addtocarttoshop', $product->id)}}">
                                    @foreach($allproducts as $product)
                                    <a href="{{route('addtocarttoshop', $product->id)}}" style="color:white">Buy now</a>
                                    @endforeach
                                </button>
                            </div> --}}
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
                            @foreach($allproducts as $product)
                            {{$product->product_detail}}
                            @endforeach
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
@endsection



