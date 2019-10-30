<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="images/icons/camera_lens.png"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Profile
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="\assets\css\material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="\assets\demo\demo.css" rel="stylesheet" />
</head>

<body class="">
@include('sweetalert::alert')
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/user_asset/images/icons/mokaLogo3.png" class="pl-3" style="height: 20px">
        </a>
      </div>

      <div class="sidebar-wrapper">
        <ul class="nav">

          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.userinfo') }}">
              <i class="material-icons">dashboard</i>
              <p>จัดการกับบัญชีของฉัน</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{ route('profile.personal') }}">
              <i class="material-icons">accessibility</i>
              <p>ข้อมูลส่วนตัว</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{ route('profile.addressbook') }}">
              <i class="material-icons">book</i>
              <p>สมุดที่อยู่</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{ route('profile.payment') }}">
              <i class="material-icons">credit_card</i>
              <p>ตัวเลือกการชำระเงิน</p>
            </a>
          </li>




          <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">offline_pin</i>
                  <p>สถานะการสั่งซื้อ</p>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile.status.allOrders') }}">
                      ทั้งหมด
                   </a>

                   <a class="dropdown-item" href="{{ route('profile.status.payPending') }}">
                      อยู่ระหว่างการชำระเงิน
                   </a>

                   <a class="dropdown-item" href="{{ route('profile.status.paidOrders') }}">
                      ชำระเงินแล้ว
                   </a>

                   <a class="dropdown-item" href="{{ route('profile.status.deliveryPending') }}">
                      อยู่ระหว่างการจัดส่ง
                   </a>

                   <a class="dropdown-item" href="{{ route('profile.status.received') }}">
                      สำเร็จ
                   </a>

                </div>
              </li>





      </div>
    </div>
    <div class="main-panel">

      <!-- Navbar -->

<nav aria-label="Page navigation example"></nav>

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="/">MOKA</a>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>

            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/">
                  <i class="material-icons">home</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>

              {{-- <li class="nav-item dropdown">
                <a class="nav-link" href="shoppingCart" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">shopping_cart</i>
                    <span class="notification">{{Cart::count()}}</span>
                    <p class="d-lg-none d-md-block">
                    </p>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <div class="header-wrapicon2">
                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
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
                                        <div class="header-cart-item-img" >
                                            <img src="/user_asset/images/item-cart-01.jpg" alt="IMG" style="height:60px">
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
              </li> --}}

              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
              </li>
            </ul>
          </div>
        </div>


      </nav>
      <!-- End Navbar -->



        @yield('content')

              </div>
            </div>
          </div>



  <!--   Core JS Files   -->
  <script src="\assets\js\core\dropzone.js"></script>
  <script src="\assets\js\core\jquery.min.js"></script>
  <script src="\assets\js\core\popper.min.js"></script>
  <script src="\assets\js\core\bootstrap-material-design.min.js"></script>
  <script src="\assets\js\plugins\perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="\assets\js\plugins\moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="\assets\js\plugins\sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="\assets\js\plugins\jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="\assets\js\plugins\jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="\assets\js\plugins\bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="\assets\js\plugins\bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="\assets\js\plugins\jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="\assets\js\plugins\bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="\assets\js\plugins\jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="\assets\js\plugins\fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="\assets\js\plugins\jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="\assets\js\plugins\nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="\assets\js\plugins\arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="\assets\js\plugins\chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="\assets\js\plugins\bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="\assets\js\material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="\assets\demo\demo.js"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>