@extends('layouts.main')
@section('title','VrinVrogv - My Biddings')
@section('header-script-css')
<link rel="stylesheet" href="{{asset('plugin/dropify/dist/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('plugin/datatables/responsive.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('plugin/datatables/dataTables.bootstrap5.min.css')}}">
<script src="{{asset ('bundles/dataTables.bundle.js') }}"></script>
@endsection
@section('main-content')
<div class="body d-flex py-3">  
                <div class="container-xxl"> 
                    <div class="row align-items-center"> 
                        <div class="border-0 mb-4"> 
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Successful Biddings</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3 mb-3"> 
                        <div class="col-md-12">
                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                            <div class="card"> 
                                <div class="card-body"> 
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width: 100%;">  
                                        <thead>
                                            <tr>
                                                <th>Product Id</th>
                                                <th>Item</th>
                                                <th>Payment Status</th>
                                                <th>Seller Name</th>
                                                <th>Starting Price</th>
                                                <th>Bagged Price</th>
                                                <th>No of Bids</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($successfulbiddings as $bidding)
                                            <tr>
                                                <td><a href="order-details.html"><strong>VVP{{ $bidding->id }}</strong></a></td>
                                                <td><img src="{{  asset('storage/products/'.$bidding->image1) }}" class="avatar lg rounded me-2" alt="profile-image"><span> {{ $bidding->name }} </span></td>
                                                <td><span class="badge bg-info">To Initiate</span></td>
                                                <td>{{ $bidding->seller }}</td>
                                                <td>
                                                    {{ $bidding->starting_bid_price }}
                                                </td>
                                                <td>
                                                    {{ $bidding->current_bid_price }}
                                                </td>
                                                <td>{{ $bidding->number_of_bids }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary bg-success" style="border-radius: 20px; color: white;">View Details</button>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary bg-danger" style="border-radius: 20px; color: white;"  data-bs-toggle="modal" data-bs-target="#expdelete">Make Payment</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                </div>
            </div>    
@endsection
@section('script')
<script>

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