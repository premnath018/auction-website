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
                                                            <img src="{{ asset('storage/products/'.$product->image1) }}" alt="" width="450" height="450"  style="object-fit: cover; border-radius: 13px;">
                                                        </a>
                                                        <a class="single-image tab-pane fade" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-two-tab">
                                                            <img src="{{ asset('storage/products/'.$product->image2) }}" alt="" width="450" height="450"  style="object-fit: cover;  border-radius: 13px;">
                                                        </a>
                                                        <a class="single-image tab-pane fade active show" id="v-pills-three" role="tabpanel" aria-labelledby="v-pills-three-tab">
                                                            <img src="{{ asset('storage/products/'.$product->image3) }}" alt="" width="450" height="450" style="object-fit: cover;  border-radius: 13px;" >
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
                                                    <p style="margin-bottom:0rem">
                                                    <span class="sale-price fs-6 text-muted" >
                                                        Starting Bid : ₹<span class="sales-price" id="startingBid">{{ $product->starting_bid_price }}</span>
                                                    </span> 
                                                    @if ($product->bid_increment !== null)
                                                        <span class="sale-price fs-6 text-muted" style="margin:0">
                                                            Increment Price : ₹<span class="sales-price"u id="increment-price">{{ $product->bid_increment }}</span>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </p>
                                                @if ($product->current_bid_price !== null)
                                                    <p class="sale-price fs-5" style="margin:0; ">
                                                        Current Bid : ₹<span class="sales-price" id="current-bid">{{ $product->current_bid_price }}</span>
                                                    </p>
                                                @endif

                                                    </div>

                                                    <!--Countdown-->

                                                    <div class="d-flex flex-wrap" style="margin-bottom: 3px;">
                                                    @if ($product->BidStartTime >  $product->now )
                                                        <span id="status" class="fw-bolder text-success fs-5">Starts in</span>
                                                    @elseif ($product->BidEndTime > $product->now )
                                                        <span id="status" class="fw-bolder text-danger fs-5">Finishes in</span>
                                                    @else
                                                        <span id="status" class="fw-bolder text-secondary fs-5">Auction Finished</span>
                                                    @endif
                                                </div>
                                                @if ($product->BidStartTime >  $product->now || $product->BidEndTime > $product->now )    
                                                    <div class="container text-color fs-3" style="padding-left: 0;" id="timer">
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
                                                @else
                                                @endif
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
                                                <div id="timer-below1"  style="display: none;">
                                                <div class="product-btn mb-5" style="padding-top: 0rem;">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="mt-2 mt-sm-0  me-1">
                                                                <div class="input-group">
                                                                    <span class="input-group-text">₹</span>
                                                                    <input  type="number" id="bidprice"  value="{{ $product->current_bid_price + $product->bid_increment }}" class="form-control" placeholder="100" min="1">
                                                                </div>
                                                            </div>
                                                            <button type="button" id="bidbtn" onclick="placebid('{{ $product->id }}')" class="btn btn-primary mx-1 mt-2  mt-sm-0 w-sm-100">Add Your Bid</button>
                                                            <button class="btn btn-primary mx-1 mt-2 mt-sm-0 "><i class="fa fa-heart me-1"></i></button>
                                                        </div>
                                                        <small class="d-block text-muted mb-2">Number of Biddings: <span id="no_of_bids">{{ $product->number_of_bids }}</span></small>
                                                    </div>
                                                   
                                                </div> 
                                                <div id="timer-below2" style="display: none;">
                                                <div class="product-btn mb-5" style="padding-top: 0rem;">
                                                    <small class="d-block text-muted mb-2">Number of Biddings: <span id="no_of_bids">{{ $product->number_of_bids }}</span></small>
                                                    <medium class="fw-bold fs-5 mb-2">Highest Bid :
                                                        @if ($product->current_bid_price)
                                                            <span class="fw-4 fw-bold" style="color: tomato"> ₹{{ $product->current_bid_price }}</span><br>
                                                        @endif
                                                        <span class="fw-semibold fs-6 mb-2 text-muted">
                                                            @if ($buyer)
                                                                Bagged By {{ $buyer->name }}
                                                            @endif
                                                        </span>
                                                    </medium>
                                                    @if (!($buyer))
                                                               <span class="fw-4 fw-bold" style="color: tomato">Unsold</span><br>  
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="alert alert-danger" role="alert" id="warningMsg" style="display: none;">
                                                    </div>
                                            <div class="alert alert-success" role="success" id="successMsg" style="display: none;">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                                <h6 class="mb-0 fw-bold fs-4">Biddings Summary</h6>
                                            </div>
                            <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <h6 class="mb-0 fw-bold fs-5">Leaderboard</h6><br>                  
                                    <table  class="table table-hover align-middle mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Bid Price</th>
                                            </tr>
                                        </thead>
                                        <tbody id="leaderboard-table">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <h6 class="mb-0 fw-bold fs-5">My Biddings</h6><br>                     
                               <table  class="table table-hover align-middle mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Bid Price</th>
                                                <th>Timings</th>
                                            </tr>
                                        </thead>
                                        <tbody id="my-biddings">
                                            
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

                       
                    </div> <!-- Row end  -->  
                </div>
            </div>    
        
@endsection
@section('script')
<script>

        // Timer JS
            const countToDate = new Date("{{ $product->BidEndTimeClock }}")
            const countFromDate = new Date("{{ $product->BidStartTimeClock }}")
            let previousTimeBetweenDates;
            var timeBetweenDates;
            const statusSpan = document.getElementById('status');
            const timerBelow1 = document.getElementById('timer-below1'); // Replace with the actual ID
            const timerBelow2 = document.getElementById('timer-below2'); // Replace with the actual ID
            setInterval(() => {
                const currentDate = new Date()
                if (currentDate >= countFromDate && currentDate <= countToDate) {
                    timeBetweenDates = Math.ceil((countToDate - currentDate) / 1000)
                    flipAllCards(timeBetweenDates)  
                    timerBelow1.style.display = 'block';
                    timerBelow2.style.display = 'none';
                    statusSpan.textContent = 'Finishes in';
                    statusSpan.classList.remove('text-success');
                    statusSpan.classList.add('text-danger');
                }
                if (currentDate <= countFromDate ){
                    timeBetweenDates = Math.ceil((countFromDate - currentDate) / 1000)
                    flipAllCards(timeBetweenDates)       
                    timerBelow1.style.display = 'none';
                    timerBelow2.style.display = 'none';         
                    statusSpan.textContent = 'Starts In';
                    statusSpan.classList.remove('text-danger');
                    statusSpan.classList.add('text-success');
                }
                if (currentDate >= countToDate ){
                    const timer = document.getElementById(`timer`); 
                    if (timer){
                        timer.remove();
                    }
                    timerBelow1.style.display = 'none';
                    timerBelow2.style.display = 'block';
                    statusSpan.textContent = 'Auction Finished';
                    statusSpan.classList.remove('text-danger');
                    statusSpan.classList.add('text-secondary');
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

  

            function placebid(product_id) {
                const bidAmount = parseFloat($('#bidprice').val());
                const currentBid = parseFloat($('#current-bid').text());
                const bidIncrement = parseFloat($('#increment-price').text());
                const startingBid = parseFloat($('#startingBid').text())
                // Validate the bid amount
              //  console.log(bidAmount);
               // console.log(startingBid);
                if (  bidAmount < startingBid) {
                    $('#warningMsg').text('Bid must be greater than or equal to Starting Bid');
                    $('#warningMsg').css('display', 'block'); 
                    setTimeout(function() {
                    $('#warningMsg').css('display', 'none');
                    }, 3000);
                    return;
                }
                if (  bidAmount < currentBid + bidIncrement ){
                    $('#warningMsg').text('Bid must be greater than or equal to Current Price + Increment Price.');
                    $('#warningMsg').css('display', 'block'); 
                    setTimeout(function() {
                    $('#warningMsg').css('display', 'none');
                    }, 3000);
                    return;
                }
                // Send an AJAX request to place the bid
                $.ajax({
                    type: 'POST',
                    url: "/place-bid",
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'bid_amount': bidAmount,
                        'productId': product_id
                    },
                    success: function(response) {
                      //  console.log(response);
                        if (response.success === true){
                            $('#successMsg').text('You Bid is placed successfully.');
                            $('#successMsg').css('display', 'block'); 
                            setTimeout(function() {
                            $('#successMsg').css('display', 'none');
                            }, 3000);
                            $('#no_of_bids').text(response.number_of_bids);
                            $('#current-bid').text(response.current_bid)
                            $('#bidprice').val(parseFloat(response.current_bid) + parseFloat(bidIncrement));
                            return;
                          
                        }
                    },
                    error: function(error) {
                        // Handle the error response, e.g., show an error message
                        console.error(error);
                    }
                });
            }

    function updateProductLeaderboard(productId) {
        const bidIncrement = parseFloat($('#increment-price').text());
    $.ajax({
        type: 'GET',
                url: `/get-product-leaderboard/`,
                data: {
                        '_token': $('input[name="_token"]').val(),
                        'productId': productId
                    },
                success: function(response) {
                    if (response.success) {
                    //    console.log(response);
                        const leaderboardTable = $('#leaderboard-table');
                        leaderboardTable.empty();

                        response.topBids.forEach((entry, index) => {
                            const row = `
                                <tr>
                                    <td><strong>${index + 1}</strong></td>
                                    <td>${entry.name}</td>
                                    <td>${entry.bid_amount}</td>
                                </tr>
                            `;
                            leaderboardTable.append(row);
                        });
                        $('#no_of_bids').text(response.number_of_bids);
                        $('#current-bid').text(response.current_bid);  
                        console.log(bidIncrement);
                        console.log(response.current_bid);
                        $('#bidprice').val(parseFloat(response.current_bid) + parseFloat(bidIncrement));
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

    function updateUserBiddings(productId) {
    $.ajax({
        type: 'GET',
                url: `/get-user-biddings/`,
                data: {
                        '_token': $('input[name="_token"]').val(),
                        'productId': productId
                    },
                success: function(response) {
                    if (response.success) {
                    //    console.log(response);
                        const UserBiddingTable = $('#my-biddings');
                        UserBiddingTable.empty();

                        response.userBiddings.forEach((entry, index) => {
                        if (index < 5) {
                            const row = `
                                <tr>
                                    <td><strong>${index + 1}</strong></td>
                                    <td>${entry.bid_amount}</td>
                                    <td>${entry.formatted_timestamp}</td>
                                </tr>
                            `;
                            UserBiddingTable.append(row);
                        } else {
                            return false; // Break the loop after reaching index 4
                        }
                    });
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

    

        // Call the function to update leaderboard initially and every 5 seconds
        updateUserBiddings("{{ $product->id }}");
        setInterval(() => updateUserBiddings("{{ $product->id }}"), 10000);
        updateProductLeaderboard("{{ $product->id }}");
        setInterval(() => updateProductLeaderboard("{{ $product->id }}"), 10000);

        

    </script>

@endsection