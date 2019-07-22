@extends('layouts.appz')
@section('content')

<header class="header1">
<section class="bgwhite p-t-55 p-b-65">

    <div class="container">
        <div class="row">
            <div class="w-size14 p-t-30 respon5">
                <div class="pl-2 pl-4"><h4 class="product-detail-name m-text16 p-b-13">
                    All products
                </h4></div>

{{--
                    <div class="search-product pos-relative bo4 of-hidden">
                        <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div> --}}
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-12 p-b-50">
                <!--  -->
                <!-- Product -->
                <div class="row">
                    @foreach($productslist as $product)
                    <div class="col-sm-3 col-md-3 col-lg-3 p-b-50">
                        <!-- Block2 -->
                        <div class="block2">

                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="/images/item-02.jpg" alt="IMG-PRODUCT">

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
        {{ $productslist->links() }}
        </div>
    </div>
</section>

@endsection
