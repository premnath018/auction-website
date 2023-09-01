@extends('layouts.main')
@section('title','VrinVrogv - Transaction History')
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
                                <h3 class="fw-bold mb-0">Transaction History</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Product Id</th>
                                                <th>Product</th>
                                                <th>Seller</th> 
                                                <th>Amount</th>
                                                <th>Transaction Id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>#PR-00002</strong>
                                                </td>
                                                <td>
                                                    Watch
                                                </td>
                                                <td>
                                                    <span class="fw-bold ms-1">Joan Dyer</span>
                                                </td>
                                                <td>₹490</td>
                                                <td><span class="fw-bold">1168-9135-7291-5742</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
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