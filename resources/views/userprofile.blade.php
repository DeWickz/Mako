<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@extends('layouts.appss')

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<title>Profile</title>
<div class="container">
    <form method="post">
        <div class="row">
            @foreach($user_detail as $detail)
            Firstname: {{$detail->user_firstname}}
            <br/>
            <br/>
            Lastname: {{$detail->user_lastname}}
            <br/>
            <br/>
            Line: {{$detail->user_LineUID}}
            <br/>
            <br/>
            Mobile: {{$detail->user_mobile}}
            <br/>
            <br/>
            @endforeach
            <h4></h4>
        </div>
    </form>
</div>
<div class="container">
        <div class="row">
          <div id="content" class="col-sm-12 contact-form">
            <h3>My Account</h3>

            <div class="grid">

              <div class="grid-item two-thirds medium-down--one-whole">
                <h3>Order History</h3>

                <p>You haven't placed any orders yet.</p>





              </div>

              <div class="grid-item one-third medium-down--one-whole">
                <h3>Account Details</h3>

                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td class="text-left">
                        <h5>f t</h5>


                      </td>
                      <td class="text-right">
                        <p>
                          <a href="/account/addresses">View Addresses (0)</a>
                        </p>

                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div>
        </div>
      </div>
</div>

<div>
    <ul class="nav-container" >
        <li class="item" id="Manage-My-Account"><a class="active"
                                                                                      href="//member.lazada.co.th/user/profile#/" data-spm="Manage-My-Account"><span>Manage My Account</span></a>
            <ul class="item-container" >
                <li id="My-profile" class="sub"><a href="profile"
                                                                                                                                                                        data-spm="My-profile">My Profile</a></li>
                <li id="Address-book" class="sub"><a href="//member.lazada.co.th/address"
                                                                                                                                                                        data-spm="Address-book">Address Book</a></li>
                <li id="Payment-methods" class="sub"><a href="//checkout.lazada.co.th/payment/management"
                                                                                                                                                                        data-spm="Payment-methods">My Payment Options</a></li>
                <li id="e-Wallet" class="sub"><a href="//member.lazada.co.th/wallet/my-wallet"
                                                                                                                                                                        data-spm="e-Wallet">Lazada Wallet</a></li>
                <li id="Vouchers" class="sub"><a href="//my.lazada.co.th/promotion/my-voucher"
                                                                                                                                                                        data-spm="Vouchers">Vouchers</a></li>
            </ul></li>
        <li class="item" id="My-Orders"><a href="//my.lazada.co.th/customer/order/index/" data-spm="My-Orders"><span>My Orders</span></a>
            <ul class="item-container" >
                <li id="Returns" class="sub"><a href="//my.lazada.co.th/customer/returns/index?requestType=return"
                                                                                                                                                                        data-spm="Returns">My Returns</a></li>
                <li id="Cancellations" class="sub"><a href="//my.lazada.co.th/customer/cancellations/index?requestType=cancel"
                                                                                                                                                                        data-spm="Cancellations">My Cancellations</a></li>
            </ul></li>
        <li class="item" id="My-Reviews"><a href="//my.lazada.co.th/customer/myReview/my-reviews" data-spm="My-Reviews"><span>My Reviews</span></a>
            <ul class="item-container" >

            </ul></li>
        <li class="item" id="My-Wishlists"><a href="//my.lazada.co.th/wishlist/index" data-spm="My-Wishlists"><span>My Wishlist &amp; Followed Stores</span></a>
            <ul class="item-container" >

            </ul></li>
        <li class="item" id="Sell-On-Lazada"><a href="https://www.lazada.co.th/sell-on-lazada/" data-spm="Sell-On-Lazada"><span>Sell On Lazada</span></a>
            <ul class="item-container" >

            </ul></li>
    </ul>
</div>


{{-- in the <div class = "row"></div></div> --}}
{{-- <div class="col-md-4">
        <div class="profile-img">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
            <div class="file btn btn-lg btn-primary">
                Change Photo
                <input type="file" name="file"/>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="profile-head">
                    <h5>
                        Kshiti Ghelani
                    </h5>
                    <h6>
                        Web Developer and Designer
                    </h6>
                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-2">
        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="profile-work">
            <p>WORK LINK</p>
            <a href="">Website Link</a><br/>
            <a href="">Bootsnipp Profile</a><br/>
            <a href="">Bootply Profile</a>
            <p>SKILLS</p>
            <a href="">Web Designer</a><br/>
            <a href="">Web Developer</a><br/>
            <a href="">WordPress</a><br/>
            <a href="">WooCommerce</a><br/>
            <a href="">PHP, .Net</a><br/>
        </div>
    </div>
    <div class="col-md-8">
        <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-6">
                                <p>Kshiti123</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>Kshiti Ghelani</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>kshitighelani@gmail.com</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>123 456 7890</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Profession</label>
                            </div>
                            <div class="col-md-6">
                                <p>Web Developer and Designer</p>
                            </div>
                        </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Your Bio</label><br/>
                        <p>Your detail description</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
