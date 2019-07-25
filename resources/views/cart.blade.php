<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" type="image/png" href="/user_asset/images/icons/camera_lens.png"/>
<!------ Include the above in your HEAD tag ---------->
@extends('layouts.appz')

@section('content')

<title>Shopping Cart</title>

<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
    <h2 class="l-text2 t-center">
        Cart
    </h2>
</section>
@if(Cart::content()->count() != 0)
<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Product</th>
                        <th class="column-3">Price</th>
                        <th class="column-4">Quantity</th>
                        <th class="column-5">Total</th>
                    </tr>
                    @foreach(Cart::content() as $product)
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="images/item-10.jpg" alt="IMG-PRODUCT">
                            </div>
                        </td>
                        <td class="column-2">
                            <a href="{{ route('productsWelcome2.show', ['id' => $product->id]) }}" class="header-cart-item-name">
                                    {{$product->name}}
                            </a>
                        </td>
                        <td class="column-3">‎฿ {{$product->price}}</td>
                        <td class="column-4">
                            <a type="button" class="btn btn-secondary" href="{{route('cart.incr', ['id' => $product->rowId, 'qty' => $product->qty])}}">Add</a>
                            {{$product->qty}}
                            <a type="button" class="btn btn-secondary" href="{{route('cart.decr', ['id' => $product->rowId, 'qty' => $product->qty])}}">Subt</a>
                            <a type="button" class="btn btn-secondary" href="{{route('cart.delete', ['id' => $product->rowId])}}">Remove</a>
                        </td>
                        <td class="column-5">‎฿ {{$product->total}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
                <div class="size11 bo4 m-r-10">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
                </div>

                <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                    <!-- Button -->
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Apply coupon
                    </button>
                </div>
            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <!-- Button -->
                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    <a href="{{route('updateCart')}}" style="Color:white">Update Cart</a>
                </button>
            </div>
        </div>

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <!--  -->
            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                <span class="m-text22 w-size19 w-full-sm">
                    Total:
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                    ฿ {{$total_price}}
                </span>
            </div>

            <div class="size15 trans-0-4">
                <!-- Button -->
                <a href="{{route('checkout')}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                {{-- <a href="" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"> --}}
                    Proceed to Checkout
                </a>
            </div>
        </div>
    </div>
</section>
@else
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
    <h1 class="l-text2 t-center" style="color:grey">
        No items
    </h1>
</section>
@endif




@endsection

