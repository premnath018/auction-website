@extends('layouts.main')
@section('title','VrinVrog - Search Result')
        @section('main-content')
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3 py-md-2">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="container-xxl">
                    <div class="col-12">
                        <div class="card mb-3">
                        <div class="col-12 pt-3 "  style="padding-left: 1.5rem;">
                            <h6 class="mb-0 fw-bold fs-5">Search result</span></h6><br>                     
                        </div>
                        @if(count($liveAuctions)>0)
                        <!--Bids on live-->
                        <section class="pt-3" style="padding:0;">
                            <div class="containe">
                                <div class="row" style="padding: 0rem 1.5rem 2rem;">
                                    <div class="col-12">
                                    <h6 class="mb-0 fw-bold fs-4">Ongoing Bids</h6><br>                     
                                    </div>
                                    <div class="col-12">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                    @foreach($liveAuctions as $auction)
                                                    
                                                    <div class="col-md-4 mb-3" id="OG{{ $auction->id }}">
                                                            <div class="card" style="border-radius: 20px; height: auto; overflow: hidden;">
                                                                <img  src="{{ asset('storage/products/'.$auction->image1) }}" width="300" height="300" style="object-fit: cover;">
                                                                <div class="card-body">
                                                                <h4 class="card-title fw-bold" style="margin-bottom: 0;"><a href="/auction/{{$auction->id}}"> {{ $auction->name }}</a></h4>
                                                                    <p class="text-muted fs-6" style="margin-bottom: 2px;">by  {{ $auction->seller->name }}<span class="d-block fw-semibold fs-8 fst-italic">Category : {{ $auction->category_name }}</span></p>
                                                                    <span class="d-block fw-semibold fs-6 text-muted">Starting Bid: <span class="fw-semibold" style="font-size: 18px;">₹ {{ $auction->starting_bid_price }}</span></span>
                                                                    @if ($auction->current_bid_price !== null)
                                                                        <span class="d-block fw-semibold fs-6" style="margin-bottom: 8px;">Current Bid: <span class="fw-bold" style="font-size: 20px;">₹ {{ $auction->current_bid_price }}</span></span>
                                                                    @else
                                                                    <span class="d-block fw-bold fs-6" style="margin-bottom: 8px;">No Bids Yet</span>
                                                                    @endif                                                                  <!--Countdown-->
                                                                    <div class="col-12 countdown-timer" data-product-id="{{ $auction->id }}">

                                                                        <div class="" style="width: 50%; display: inline-block;">
                                                                            <div class="d-flex flex-wrap">
                                                                                <span class="fw-semibold text-danger mb-1">Finishes In</span>
                                                                            </div>
                                                                            
                                                                            
                                                                            <div class="container text-color fs-6" style="padding-left: 0;">
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
                                                                                    <div class="segment-title fw-semibold time-color fs-7">D</div>
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
                                                                                    <div class="segment-title fw-semibold time-color fs-7">H</div>
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
                                                                                    <div class="segment-title fw-semibold time-color fs-7">M</div>
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
                                                                                    <div class="segment-title fw-semibold time-color fs-7">S</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                        <a href="/auction/{{$auction->id}}" class="btn btn-primary " style="width: 40%;display: inline-block; margin-top: 10px; margin-left: 15px; border-radius: 18px;">
                                                                            Bid Now
                                                                        </a>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                        
                                                            </div>
                                                        </div>
                    
                                                    @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                    @if (count($upcomingAuctions)>0)
                        <!--Upcoming Bids-->
                        <section class="pt-3" style="padding:0;">
                            <div class="containe">
                                <div class="row" style="padding: 0rem 1.5rem 2rem;">
                                    <div class="col-12">
                                    <h6 class="mb-0 fw-bold fs-4">Upcoming Bids</h6><br>                     
                                    </div>
                                    <div class="col-12">
                                          
                                                    <div class="row">
                                                    @foreach($upcomingAuctions as $auction)

                                                    <div class="col-md-4 mb-3" id="UP{{ $auction->id }}">
                                                            <div class="card" style="border-radius: 20px; height: auto; overflow: hidden;">
                                                                <img  src="{{ asset('storage/products/'.$auction->image1) }}" width="300" height="300" style="object-fit: cover;">
                                                                <div class="card-body">
                                                                <h4 class="card-title fw-bold" style="margin-bottom: 0;"><a href="/auction/{{$auction->id}}"> {{ $auction->name }}</a></h4>
                                                                    <p class="text-muted fs-6" style="margin-bottom: 2px;">by  {{ $auction->seller->name }}<span class="d-block fw-semibold fs-8 fst-italic">Category : {{ $auction->category_name }}</span></p>
                                                                    <span class="d-block fw-semibold fs-6 text-muted">Starting Bid: <span class="fw-semibold" style="font-size: 18px;">₹ {{ $auction->starting_bid_price }}</span></span>
                                                                    @if ($auction->current_bid_price !== null)
                                                                        <span class="d-block fw-semibold fs-6" style="margin-bottom: 8px;">Current Bid: <span class="fw-bold" style="font-size: 20px;">₹ {{ $auction->current_bid_price }}</span></span>
                                                                    @else
                                                                    <span class="d-block fw-bold fs-6" style="margin-bottom: 8px;">No Bids Yet</span>
                                                                    @endif                                                                  <!--Countdown-->
                                                                    <div class="col-12 countdown-timer" data-product-id="{{ $auction->id }}">

                                                                        <div class="" style="width: 50%; display: inline-block;">
                                                                            <div class="d-flex flex-wrap">
                                                                                <span class="fw-semibold text-success mb-1">Starts In</span>
                                                                            </div>
                                                                            
                                                                            
                                                                            <div class="container text-color fs-6" style="padding-left: 0;">
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
                                                                                    <div class="segment-title fw-semibold time-color fs-7">D</div>
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
                                                                                    <div class="segment-title fw-semibold time-color fs-7">H</div>
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
                                                                                    <div class="segment-title fw-semibold time-color fs-7">M</div>
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
                                                                                    <div class="segment-title fw-semibold time-color fs-7">S</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                        <a href="/auction/{{$auction->id}}" class="btn btn-primary " style="width: 40%;display: inline-block; margin-top: 10px; margin-left: 15px; border-radius: 18px;">
                                                                            View </a>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                        
                                                            </div>
                                                        </div>
                                                        @endforeach

                                              
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                    </div>
                </div>
            </div>
            </div>

        @endsection
      
  <!--Countdown Style-->
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
gap: .2em;
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

@section('script')
<script>
// Timer JS
            @foreach($upcomingAuctions as $auction)
                initializeCountdownTimer(
                    "{{ $auction->BidStartTimeClock }}",
                    "{{ $auction->BidEndTimeClock }}",
                    "{{$auction->id}}"
                );
            @endforeach    

            @foreach($liveAuctions as $auction)
                initializeCountdownTimer(
                    "{{ $auction->BidStartTimeClock }}",
                    "{{ $auction->BidEndTimeClock }}",
                    "{{$auction->id}}"
                );
            @endforeach         

            function initializeCountdownTimer(startTime, endTime, productId) {
            const countToDate = new Date(endTime);
            const countFromDate = new Date(startTime);
            const countdownElement = document.querySelector(`.countdown-timer[data-product-id="${productId}"]`);
            let previousTimeBetweenDates;
            var timeBetweenDates;
            setInterval(() => {
                const currentDate = new Date()
                if (currentDate >= countFromDate && currentDate <= countToDate) {
                    timeBetweenDates = Math.ceil((countToDate - currentDate) / 1000)
                    flipAllCards(timeBetweenDates)
                    const card = document.getElementById(`UP${productId}`); // Replace 'cardId' with the actual ID of the card element
                    if (card) {
                        card.remove(); // This will remove the card from the DOM
                    }
                }
                if (currentDate <= countFromDate ){
                    timeBetweenDates = Math.ceil((countFromDate - currentDate) / 1000)
                    flipAllCards(timeBetweenDates)
                }
                
                if (currentDate >= countToDate ){
                    const card = document.getElementById(`OG${productId}`); // Replace 'cardId' with the actual ID of the card element
                    if (card) {
                        card.remove(); // This will remove the card from the DOM
                    }
                }

                previousTimeBetweenDates = timeBetweenDates
            }, 250)

            function flipAllCards(time) {
                const seconds = time % 60
                const minutes = Math.floor(time / 60) % 60
                const hours = Math.floor(time % (3600 * 24) / 3600)
                const days = Math.floor(time / (3600 * 24))

                flip(countdownElement.querySelector("[data-days-tens]"), Math.floor(days / 10));
                flip(countdownElement.querySelector("[data-days-ones]"), days % 10);
                flip(countdownElement.querySelector("[data-hours-tens]"), Math.floor(hours / 10));
                flip(countdownElement.querySelector("[data-hours-ones]"), hours % 10);
                flip(countdownElement.querySelector("[data-minutes-tens]"), Math.floor(minutes / 10));
                flip(countdownElement.querySelector("[data-minutes-ones]"), minutes % 10);
                flip(countdownElement.querySelector("[data-seconds-tens]"), Math.floor(seconds / 10));
                flip(countdownElement.querySelector("[data-seconds-ones]"), seconds % 10);
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
        }
  
</script>
            @endsection