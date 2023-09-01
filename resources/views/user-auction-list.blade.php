@extends('layouts.main')
@section('title','VrinVrogv - My Auction List')
@section('header-script-css')
<link rel="stylesheet" href="{{asset('plugin/dropify/dist/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('plugin/datatables/responsive.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('plugin/datatables/dataTables.bootstrap5.min.css')}}">
<script src="{{asset ('bundles/dataTables.bundle.js') }}"></script>
@endsection
@section('main-content')
                <!-- Body: Body -->
                <div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">My Auction List</h3>
                                <div class="col-auto d-flex w-sm-100">
                                    <a class="btn btn-primary btn-set-task w-sm-100"  href="{{ route('product.add') }}"><i class="icofont-plus-circle me-2 fs-6"></i>Add New Auction</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Product</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                <th>Start Price</th>
                                                <th>Bid Increment</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Highest Bidder</th> 
                                                <th>Highest Bid</th> 
                                                <th>No Of Bids</th>
                                                <th>Actions</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                        <td><strong><a href="{{ url('/auction', $product->id) }}" >{{ 'VVP'.$product->id }}</strong></td>

                                        <td>{{ $product->name }}</td>

                                        <td>@if ($product->status == 1)
                                                    <span class="badge bg-warning">Upcoming</span>
                                                @elseif ($product->status == 2)
                                                    <span class="badge bg-success">Ongoing</span>
                                                @elseif ($product->status == 3)
                                                    <span class="badge bg-danger">Completed</span>
                                                @endif
                                        </td>

                                        <td>{{ $product->category }}</td>

                                        <td>{{ $product->starting_bid_price }}</td>

                                        <td>{{ $product->bid_increment }}</td>

                                        <td>{{ $product->BidStartTime }}</td>

                                        <td>{{ $product->BidEndTime }}</td>

                                        <td>{{ $product->buyer_name ?? '#NA' }}</td>

                                        <td>{{ $product->current_bid_price ?? '#NA' }}</td>

                                        <td>{{ $product->number_of_bids ?? '#NA' }}</td>


                                        <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <button type="button"  onclick="popEdit('{{ $product->id }}')" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#expedit">
                                                    <i class="icofont-edit text-success"></i>
                                                </button>
                                            <button type="button" onclick="popDel('{{ $product->id }}')" class="btn btn-outline-secondary deleterow" data-bs-toggle="modal" data-bs-target="#expdelete">
                                                <i class="icofont-ui-delete text-danger"></i>
                                            </button>
                                        </div>
                                    </td>

                                        </tr>

                                        @endforeach
                                               
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
        </div>    
    </div>

    <div class="modal fade" id="expdelete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
     <div class="modal-content">
    <div class="modal-body">
    <div class="mb-3 text-center">
                            <h6 class="fw-semibold mb-0">Are you sure you want to delete this?</h6>
                        </div>
    <div class="mb-3 text-center">
        <form action="{{ route('product.delete') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" id="product_id" value="">
            <button type="submit" class="btn btn-secondary btn-danger">Delete</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>  
    
    
    <div class="modal fade" id="expedit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
     <div class="modal-content">
    <div class="modal-body">
    <div class="mb-3 text-center">
         <h6 class="fw-semibold mb-0">Kindly be aware that editing auction product details will require re-uploading photos and resetting the auction time, as these settings will be reset</h6>
    </div>
    <div class="mb-3 text-center">
        <form action="{{ route('product.delete') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" id="product_id1" value="">
            <a href="" id="popEdit" class="btn btn-danger">Continue</a>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div> 
    
@endsection
@section('script')
<script>

                
            function popEdit(id) {
                const productId =id
                $('#product_id').val(productId);
                var popEditLink = $('#popEdit');
                var newHref = "/edit-auction/" + productId;
                popEditLink.attr('href', newHref);
                }
        
       function popDel(id) {
                const productId =id
                $('#product_id').val(productId);
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
    

</script>

@endsection