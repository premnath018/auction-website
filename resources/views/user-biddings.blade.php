@extends('layouts.main')
@section('title','VrinVrogv - My Biddings')
@section('header-script-css')
<link rel="stylesheet" href="{{asset('plugin/dropify/dist/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('plugin/datatables/responsive.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('plugin/datatables/dataTables.bootstrap5.min.css')}}">
<script src="{{asset ('bundles/dataTables.bundle.js') }}"></script>
@endsection
@section('main-content')
            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">My Biddings</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3 mb-3">
                    @if ($myBiddings->isEmpty())
                        <div class="alert alert-danger fw-bolder">No Bids Yet</div>
                    @else
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        @foreach($myBiddings as $bidding)   
                        <div class="card mb-3 bg-transparent p-2">
                                <div class="card border-0 mb-1">
                                   
                                    <div class="card-body d-flex align-items-center flex-column flex-md-row">
                                        <a href="/auction/{{$bidding->product_id}}">
                                            <img class="w120 rounded img-fluid" src="{{  asset('storage/products/'.$bidding->product_image) }}" alt="">
                                        </a>
                                        <div class="ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                                            <a href="/auction/{{$bidding->product_id}}"><h6 class="mb-3 fw-bold">{{ $bidding->product_name }}<span class="text-muted small fw-light d-block">Product Id: {{ 'VVP'.$bidding->product_id }}</span></h6></a>
                                                <div class="d-flex flex-row flex-wrap align-items-center justify-content-center justify-content-md-start">
                                                    <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                                        <div class="text-muted small">Seller</div>
                                                        <strong>{{ $bidding->seller }}</strong>
                                                    </div>
                                                    <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                                        <div class="text-muted small">Starting Bid</div>
                                                        <strong>₹{{ $bidding->starting_bid }}</strong>
                                                    </div>
                                                    <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                                        <div class="text-muted small">Highest Bid</div>
                                                        <strong>₹{{ $bidding->highest_bid }}</strong>
                                                    </div>
                                                    <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                                        <div class="text-muted small">Auction Status</div>
                                                        <strong>{{ $bidding->auction_status }}</strong>
                                                    </div>
                                                    <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                                        <div class="text-muted small">My Bid</div>
                                                        <strong>₹{{ $bidding->highest_bid_amount }}</strong>
                                                    </div>
                                                    <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2">
                                                        <div class="text-muted small">Bid Status</div>
                                                        <strong>{{ $bidding->bid_status }}</strong>
                                                    </div>
                                                </div>
                                                <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2 d-inline-flex d-md-none">
                                                    <button onclick="BidHistory('{{ $bidding->product_id }}')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editprofile">Bid History</button>
                                                </div>
                                       
                                        </div>
                                    </div>

                                    <div class="form-check form-switch position-absolute top-0 end-0 py-3 px-3 d-none d-md-block">
                                        <button onclick="BidHistory('{{ $bidding->product_id }}')" id="Eaten-switch1" class="btn btn-primary mx-1 mt-2  mt-sm-0" data-bs-toggle="modal" data-bs-target="#editprofile">Bid History</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="row g-3 mb-3" bis_skin_checked="1">
                                <div class="col-md-12" bis_skin_checked="1">
                                    <nav class="justify-content-end d-flex">
                                    {!! $myBiddings->links('pagination::bootstrap-4') !!}
                                    </nav>
                                </div>
                            </div>   
                        </div>
                        @endif
                    </div> <!-- Row end  -->
                </div>
            </div>
 
            <div class="modal fade" id="editprofile" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="expeditLabel1111">Bid History</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       
                        <div class="deadline-form">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="text">Product Id : <span class="fw-bold text-primary" id="product_id">#1204</span></p>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Bid Price</th>
                                                <th scope="col">Time</th>
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
    
@endsection
@section('script')
<script>

                        
        function BidHistory(productId) {
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
                                const productSpan = document.getElementById("product_id");
                                productSpan.textContent = "VVP"+productId;
                                response.userBiddings.forEach((entry, index) => {
                                    const row = `
                                        <tr>
                                            <td><strong>${index + 1}</strong></td>
                                            <td>${entry.bid_amount}</td>
                                            <td>${entry.formatted_timestamp}</td>
                                        </tr>
                                    `;
                                    UserBiddingTable.append(row);
                                });
                            }
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                }

        $(document).ready(function() {


            $('#myProjectTable')
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
        });
    
        function print(){
            console.log('Hello');
        }

</script>

@endsection