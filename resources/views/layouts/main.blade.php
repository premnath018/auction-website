<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('bundles/dropify.bundle.js')}}"></script>
    <script src="{{asset('bundles/js/template.js')}}"></script>
    @section('header-script-css')
    @show
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
<div id="vrinvrog-layout" class="theme-blue">
        
        <!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-4 me-0">
        <div class="d-flex flex-column h-100">
                <a href="{{ route('dashboard') }}" class="mb-0 brand-icon">
                <span class="logo-icon">
                    <img  style="height: 32px; width: 32px; filter: brightness(0) invert(1);" src="{{ asset('images/favicon.ico') }}" alt="Logo">
                </span>
                    <span class="logo-text" style="padding-left: 2px;">VrinVrog</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link" href="{{route('dashboard')}}"><i class="icofont-home fs-5"></i> <span>Home</span></a></li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                            <i class="icofont-law-order fs-5"></i>
                            <span>Auction Center</span>
                            <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                        </a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-order">
                            <li><a class="ms-link" href="{{ route('auction.hub') }}">Auction Hub</a></li>
                            <li><a class="ms-link" href="{{ route('auction.upcoming') }}">Upcomings</a></li>
                            <li><a class="ms-link" href="/my-biddings">My Biddings</a></li>
                            <li><a class="ms-link" href="/successfull-bids">Successfull Bids</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                        <i class="icofont-legal fs-5"></i> <span>My Auction</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-product">
                        <li><a class="ms-link" href="{{route('product.add')}}">Create Auction</a></li>
                            <li><a class="ms-link" href="{{route('user.auction.list')}}">My Auction List</a></li>
                        </ul> 
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Componentsone" href="#">
                        <i class="icofont-funky-man fs-5"></i> <span>My Accounts</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-Componentsone">
                            <li><a class="ms-link" href="{{route('user.profile')}}">Profile</a></li>
                            <li><a class="ms-link" href="/transaction-history">Transaction History</a></li>
                        </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#page" href="#">
                        <i class="icofont-support-faq fs-5"></i> <span>Help & Support</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="page">
                            <li><a class="ms-link" href="#">FAQ</a></li>
                            <li><a class="ms-link" href="#">Contact Us</a></li>
                            <li><a class="ms-link" href="#">Terms of Service</a></li>
                            <li><a class="ms-link" href="#">Privacy Policy</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>  

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            <div class="header">
                <div  class="d-flex justify-content-center pt-3">
                    <div id="logoheader">
                        <a href="{{ route('dashboard') }}" class="mb-0 brand-icon">
                        <span class="logo-icon">
                            <img  style="width: 25vh" src="{{ asset('images/logo1.png') }}" alt="Logo">
                        </span>
                        </a>
                    </div>
                </div>
                <style>
                        #logoheader {
                            display: block; /* Display both buttons by default */
                        }
                    @media screen and (min-width: 1199px) {
                            #logoheader {
                            display: none;
                        }
                    }
                    </style>
                <nav class="navbar py-3" id="navbar">
                <div class="container-xxl">
        
                <!-- header rightbar icon -->
                <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                    <div class="d-flex">
                        <a class="nav-link text-primary collapsed" href="help.html" title="Get Help">
                            <i class="icofont-info-square fs-5"></i>
                        </a>
                    </div>
                    <div class="dropdown zindex-popover">
                        <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="{{asset('images/flag/india.png')}}" style="width: 24px; height: 24px;" alt="">
                        </a>
                    </div>
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold"> {{ session('name'); }}</span></p>
                                    <small>User Profile</small>
                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                    <img class="avatar lg rounded-circle img-thumbnail" src="{{asset('images/profile_av.svg')}}" alt="profile">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="{{asset('images/profile_av.svg')}}" alt="profile">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold"> {{ session('name'); }}</span></p>
                                                    <small class=""> {{ 'VVAUC'.session('user_id'); }}</small>
                                                </div>
                                            </div>
                                            
                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <a href="{{route('user.profile')}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a>
                                            <a href="{{route('logout')}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>
        
                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                        <form action="/search" method="POST">
                            <div class="input-group flex-nowrap input-group-lg">   
                                @csrf
                                <input name="search"  type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                                <button type="submit" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                            </div>
                            </form>
                        </div>
        
                    </div>
                </nav>
            </div>

            <!-- Body: Body -->
            @section('main-content')
            @show
        </div>  
    </div>
 </body>
</html> 
<script> $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } }); </script>
@section('script')
@show