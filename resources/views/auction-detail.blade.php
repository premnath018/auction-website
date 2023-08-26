@extends('layouts.main')
@section('title','VrinVrogv - Auction Details')
@section('header-script-css')
<link rel="stylesheet" href="{{asset('plugin/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('main-content')
<div class="body d-flex py-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-1 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Auction Detail</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->  

                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-details">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <div class="product-details-image mt-50">
                                                    <div class="product-thumb-image">
                                                        <div class="product-thumb-image-active nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <a class="single-thumb" id="v-pills-one-tab" data-bs-toggle="pill" href="#v-pills-one" role="button" aria-controls="v-pills-one" >
                                                                <img src="{{  asset('storage/products/'.$product->image1) }}" alt="">
                                                            </a>
                                                            <a class="single-thumb" id="v-pills-two-tab" data-bs-toggle="pill" href="#v-pills-two" role="button" aria-controls="v-pills-two">
                                                                <img src="{{  asset('storage/products/'.$product->image2)}}" alt="">
                                                            </a>
                                                            <a class="single-thumb active" aria-current="page" id="v-pills-three-tab" data-bs-toggle="pill" role="button" href="#v-pills-three"  aria-controls="v-pills-three">
                                                                <img src="{{ asset('storage/products/'.$product->image3) }}" alt="">
                                                            </a>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="product-image">
                                                        <div class="product-image-active tab-content" id="v-pills-tabContent">
                                                            <a class="single-image tab-pane fade" id="v-pills-one" role="tabpanel" aria-labelledby="v-pills-one-tab">
                                                                <img src="{{ asset('storage/products/'.$product->image1) }}" alt="">
                                                            </a>
                                                            <a class="single-image tab-pane fade" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-two-tab">
                                                                <img src="{{ asset('storage/products/'.$product->image2) }}" alt="">
                                                            </a>
                                                            <a class="single-image tab-pane fade active show" id="v-pills-three" role="tabpanel" aria-labelledby="v-pills-three-tab">
                                                                <img src="{{ asset('storage/products/'.$product->image3) }}" alt="">
                                                            </a>
                                                            
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="product-details-content mt-45">
                                                    <h1 class="fw-bold fs-3" style="margin-top: 0.6rem;">{{ $product->name }}</h1>
                                                    <p class="text-muted">{{ 'by '.$user->name }}</p>
                                                    <p class="fw-bold text-muted fs-6">Category: {{ $product->category_name }}</p>
                                                    
                                                    <p style="margin-bottom: 0rem;"><span class="fw-semibold fs-5">Description</span><br> {{ $product->description }} </p>
                                                    <div class="product-price fst-italic" style="padding-top: 0px;">
                                                    <p>
                                                    <span class="sale-price fs-6 text-muted" style="margin:0">
                                                        Starting Bid : ₹<span class="sales-price" id="strtbid">{{ $product->starting_bid_price }}</span>
                                                    </span> 
                                                    @if ($product->bid_increment !== null)
                                                        <span class="sale-price fs-6 text-muted" style="margin:0">
                                                            Increment Price : ₹<span class="sales-price">{{ $product->bid_increment }}</span>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </p>
                                                @if ($product->current_price !== null)
                                                    <p class="sale-price fs-4" style="margin:0; margin-bottom:0.7rem">
                                                        Current Bid : ₹<span class="sales-price" id="crntbid">{{ $product->current_bid_price }}</span>
                                                    </p>
                                                @endif

                                                    </div>

                                                    <!--Countdown-->

                                                    <div class="d-flex flex-wrap" style="margin-bottom: 3px;">
                                                        <span class="fw-bolder text-danger ">Finishes in</span>
                                                    </div>
                                                    
                                                    
                                                    <div class="container text-color fs-3" style="padding-left: 0;">
                                                        <div class="container-segment">
                                                            <div class="segment">
                                                                <div class="flip-card" data-days-tens>
                                                                    <div class="top text-color">0</div>
                                                                    <div class="bottom text-color">0</div>
                                                                </div>
                                                                <div class="flip-card" data-days-ones>
                                                                    <div class="top text-color">0</div>
                                                                    <div class="bottom text-color">0</div>
                                                                </div>
                                                            </div>
                                                            <div class="segment-title time-color fw-bold">Days</div>
                                                        </div>
                                                        <div class="container-segment">
                                                            <div class="segment">
                                                                <div class="flip-card" data-hours-tens>
                                                                    <div class="top text-color">0</div>
                                                                    <div class="bottom text-color">0</div>
                                                                </div>
                                                                <div class="flip-card" data-hours-ones>
                                                                    <div class="top text-color">0</div>
                                                                    <div class="bottom text-color">0</div>
                                                                </div>
                                                            </div>
                                                            <div class="segment-title time-color fw-bold">Hours</div>
                                                        </div>
                                                        <div class="container-segment">
                                                            <div class="segment">
                                                                <div class="flip-card" data-minutes-tens>
                                                                    <div class="top text-color">0</div>
                                                                    <div class="bottom text-color">0</div>
                                                                </div>
                                                                <div class="flip-card" data-minutes-ones>
                                                                    <div class="top text-color">0</div>
                                                                    <div class="bottom text-color">0</div>
                                                                </div>
                                                            </div>
                                                            <div class="segment-title time-color fw-bold">Minutes</div>
                                                        </div>
                                                        <div class="container-segment">
                                                            <div class="segment">
                                                                <div class="flip-card" data-seconds-tens>
                                                                    <div class="top text-color">0</div>
                                                                    <div class="bottom text-color">0</div>
                                                                </div>
                                                                <div class="flip-card" data-seconds-ones>
                                                                    <div class="top text-color">0</div>
                                                                    <div class="bottom text-color">0</div>
                                                                </div>
                                                            </div>
                                                            <div class="segment-title time-color fw-bold">Seconds</div>
                                                        </div>
                                                    </div>

                                                    <style>

                                                    .text-color{
                                                    color: white;
                                                    }
                                                    .time-color{
                                                    color: rgb(0, 0, 0);
                                                    }
                                                    .flip-card {
                                                    position: relative;
                                                    display: inline-flex;
                                                    flex-direction: column;
                                                    box-shadow: 0 2px 3px 0 rgb(255, 255, 255);
                                                    border-radius: .1em;
                                                    }

                                                    .top,
                                                    .bottom,
                                                    .flip-card .top-flip,
                                                    .flip-card .bottom-flip {
                                                    height: .75em;
                                                    line-height: 1;
                                                    padding: .25em;
                                                    overflow: hidden;
                                                    }

                                                    .top,
                                                    .flip-card .top-flip {
                                                    background-color: #7969e1;
                                                    border-top-right-radius: .1em;
                                                    border-top-left-radius: .1em;
                                                    border-bottom: 1px solid rgb(255, 255, 255);
                                                    }

                                                    .bottom,
                                                    .flip-card .bottom-flip {
                                                    background-color: #7969e1;
                                                    display: flex;
                                                    align-items: flex-end;
                                                    border-bottom-right-radius: .1em;
                                                    border-bottom-left-radius: .1em;
                                                    }

                                                    .flip-card .top-flip {
                                                    position: absolute;
                                                    width: 100%;
                                                    animation: flip-top 250ms ease-in;
                                                    transform-origin: bottom;
                                                    }

                                                    @keyframes flip-top {
                                                    100% {
                                                    transform: rotateX(90deg);
                                                    }
                                                    }

                                                    .flip-card .bottom-flip {
                                                    position: absolute;
                                                    bottom: 0;
                                                    width: 100%;
                                                    animation: flip-bottom 250ms ease-out 250ms;
                                                    transform-origin: top;
                                                    transform: rotateX(90deg);
                                                    }

                                                    @keyframes flip-bottom {
                                                    100% {
                                                    transform: rotateX(0deg);
                                                    }
                                                    }

                                                    .container {
                                                    display: flex;
                                                    gap: .5em;
                                                    justify-content: flex-start;
                                                    }

                                                    .container-segment {
                                                    display: flex;
                                                    flex-direction: column;
                                                    gap: .1em;
                                                    align-items: center;
                                                    }

                                                    .segment {
                                                    display: flex;
                                                    gap: .1em;
                                                    }

                                                    .segment-title {
                                                    font-size: 1rem;
                                                    }
                                                    </style>

                                                    <div class="product-btn mb-5">
                                                        <!-- <div class="d-flex flex-wrap">
                                                            <span class="fs-5 text-danger">Ends in</span>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            <p class="fs-2 text-danger" id="countdownTimer">
                                                                <span class="avatar rounded-circle text-primary"><i class="icofont-sand-clock"></i></span>                                                  
                                                                <span id="days">00</span>:
                                                                <span id="hours">00</span>:
                                                                <span id="minutes">00</span>:
                                                                <span id="seconds">00</span>

                                                            </p> 
                                                        </div>                                                        -->
                                                        <div class="d-flex flex-wrap">
                                                            <div class="mt-2 mt-sm-0  me-1">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">₹</span>
                                                                    <input type="number" id="bidprice" class="form-control" placeholder="100" min="1">
                                                                </div>
                                                            </div>
                                                            <button id="bidbtn" class="btn btn-primary mx-1 mt-2  mt-sm-0">Add Your Bid</button>
                                                            <button class="btn btn-primary mx-1 mt-2 mt-sm-0 w-sm-100"><i class="fa fa-heart me-1"></i></button>
                                                        </div>
                                                        <small class="d-block text-muted mb-2">Number of Biddings: 1</small>
                                                    </div>
                                                    <div class="alert alert-danger" role="alert" id="warningMsg">
                                                       Enter Your Bid
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                <h6 class="mb-0 fw-bold fs-4">Biddings Summary</h6>
                                            </div>
                                            <div class="row g-3 mb-3">
                                                <div class="col-xl-12 col-xxl-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="product-cart">
                                                                <div class="checkout-table table-responsive">
                                                                    <table id="myCartTable" class="table display dataTable table-hover align-middle" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th> </th>
                                                                                <th>Leaderboard</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>     
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-xxl-4">
                                                    <div class="card">
                                                        <!-- <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                            <h6 class="mb-0 fw-bold ">Order Summary</h6>
                                                        </div> -->
                                                        <div class="card-body">
                                                            <div class="product-cart">
                                                                <div class="checkout-table table-responsive">
                                                                    <table id="myCartTable" class="table display dataTable table-hover align-middle" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th> </th>
                                                                                <th>Recent Biddings</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>     
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-xxl-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="product-cart">
                                                                <div class="checkout-table table-responsive">
                                                                    <table id="myCartTable" class="table display dataTable table-hover align-middle" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th> </th>
                                                                                <th>My Biddings</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4</td>
                                                                                <td class="display-7">
                                                                                    <i class="icofont-user-suited avatar lg rounded me-2"></i><span class="fs-5 title text-primary">Oculus VR </span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>     
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Recommendations Card-->
                        <div class="card">
                            <div class="pt-5 pb-5" style="padding:0;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="mb-3">Recommendations</h3>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                                <i class="fa fa-arrow-left"></i>
                                            </a>
                                            <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="row">
                            
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                            
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                            
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="row">
                            
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                            
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                            
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="row">
                            
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                            
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <div class="card">
                                                                    <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title">Special title treatment</h4>
                                                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                            View Details
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->  
                </div>
            </div>    
        
@endsection
@section('script')
<script>

        // Timer JS
            const countToDate = new Date("{{ $product->BidEndTime }}")
            const countFromDate = new Date("{{ $product->BidStartTime }}")
            console.log(countFromDate);
            let previousTimeBetweenDates;
            var timeBetweenDates;
            setInterval(() => {
                const currentDate = new Date()
                if (currentDate >= countFromDate && currentDate <= countToDate) {
                    timeBetweenDates = Math.ceil((countToDate - currentDate) / 1000)
                    flipAllCards(timeBetweenDates)
                }

                previousTimeBetweenDates = timeBetweenDates
            }, 250)

            function flipAllCards(time) {
                const seconds = time % 60
                const minutes = Math.floor(time / 60) % 60
                const hours = Math.floor(time % (3600 * 24) / 3600)
                const days = Math.floor(time / (3600 * 24))

                flip(document.querySelector("[data-days-tens]"), Math.floor(days / 10))
                flip(document.querySelector("[data-days-ones]"), days % 10)
                flip(document.querySelector("[data-hours-tens]"), Math.floor(hours / 10))
                flip(document.querySelector("[data-hours-ones]"), hours % 10)
                flip(document.querySelector("[data-minutes-tens]"), Math.floor(minutes / 10))
                flip(document.querySelector("[data-minutes-ones]"), minutes % 10)
                flip(document.querySelector("[data-seconds-tens]"), Math.floor(seconds / 10))
                flip(document.querySelector("[data-seconds-ones]"), seconds % 10)
            }

            function flip(flipCard, newNumber) {
            const topHalf = flipCard.querySelector(".top")
            const startNumber = parseInt(topHalf.textContent)
            if (newNumber === startNumber) return

            const bottomHalf = flipCard.querySelector(".bottom")
            const topFlip = document.createElement("div")
            topFlip.classList.add("top-flip")
            const bottomFlip = document.createElement("div")
            bottomFlip.classList.add("bottom-flip")

            top.textContent = startNumber
            bottomHalf.textContent = startNumber
            topFlip.textContent = startNumber
            bottomFlip.textContent = newNumber

            topFlip.addEventListener("animationstart", e => {
                topHalf.textContent = newNumber
            })
            topFlip.addEventListener("animationend", e => {
                topFlip.remove()
            })
            bottomFlip.addEventListener("animationend", e => {
                bottomHalf.textContent = newNumber
                bottomFlip.remove()
            })
            flipCard.append(topFlip, bottomFlip)
            }
        






        $(document).ready(function() {
        //Ch-editer
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            //Datatable
            $('#myCartTable')
            .addClass( 'nowrap' )
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-right' }
                ]
            });
            $('.deleterow').on('click',function(){
            var tablename = $(this).closest('table').DataTable();  
            tablename
                    .row( $(this)
                    .parents('tr') )
                    .remove()
                    .draw();

            } );
           //Multiselect
           $('#optgroup').multiSelect({ selectableOptgroup: true });
        });

        $(function() {
            $('.dropify').dropify();

            var drEvent = $('#dropify-event').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
                    replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'DÃ©solÃ©, le fichier trop volumineux'
                }
            });
        });

  
            

    </script>

@endsection