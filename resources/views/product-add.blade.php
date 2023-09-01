@extends('layouts.main')
@section('title','VrinVrogv - Create Auction')
@section('header-script-css')
<link rel="stylesheet" href="{{asset('plugin/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('main-content')
                <!-- Body: Body -->
                <div class="body d-flex py-3">
                <div class="container-xxl">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Create Auction</h3>
                    <button id="btn1" type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase ">Create</button>
                    </div>
                </div>
                </div> <!-- Row end  -->  

                <div class="row g-3 mb-3">
                @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                
                <div class="col-xl-8 col-lg-8">
                    <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Product information <span class="text-danger">*</span></h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-8">
                            <label  class="form-label">Product Name</label>
                            <input name="productName" type="text" class="form-control" placeholder="Enter Product Name">
                            </div>
                            <div class="col-md-4" >
                                                <label  class="form-label">Categories</label>
                                                <select name="category" class="form-select" aria-label="Default select example">
                                                    <option selected="" disabled>-- Select Category --</option>
                                                    <option value="1">Antiques and Collectibles</option>
                                                    <option value="2">Automobiles and Vehicles</option>
                                                    <option value="3">Jewelry and Watches</option>
                                                    <option value="4">Art and Fine Art</option>
                                                    <option value="5">Electronics and Gadgets</option>
                                                    <option value="6">Fashion and Accessories</option>
                                                    <option value="7">Home and Garden</option>
                                                    <option value="8">Sports and Fitness</option>
                                                    <option value="9">Toys and Hobbies</option>
                                                    <option value="10">Books and Collectible Literature</option>
                                                    <option value="11">Coins and Currency</option>
                                                    <option value="12">Wine and Spirits</option>
                                                    <option value="13">Agricultural and Farming Equipment</option>
                                                    <option value="14">Real Estate and Property</option>
                                                    <option value="15">Musical Instruments</option>
                                                    <option value="16">Business and Industrial Equipment</option>
                                                    <option value="17">Entertainment Memorabilia</option>
                                                    <option value="18">Health and Wellness</option>
                                                    <option value="19">Technology and Innovation</option>
                                                    <option value="20">Charity and Fundraising</option>
                                                </select>
                                            </div>
                            <div class="col-md-12">
                            <label class="form-label">Product Description</label>
                            <div id="editor">
                                <textarea name="productDescription" type="text" class="form-control" placeholder="Enter Product Description"></textarea>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Product Images Upload <span class="text-danger">*</span></h6>
                        <small class="d-block text-muted mb-2">Mandatory to add 3 images.</small>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                            <label class="form-label">Image-1</label>
                            <small class="d-block text-muted mb-2">Only portrait or square images, 2M max and 2000px max-height.</small>
                            <input name="image1" type="file" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                            </div>
                            <div class="col-md-12">
                            <label class="form-label">Image-2</label>
                            <small class="d-block text-muted mb-2">Only portrait or square images, 2M max and 2000px max-height.</small>
                            <input name="image2" type="file" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                            </div>
                            <div class="col-md-12">
                            <label class="form-label">Image-3</label>
                            <small class="d-block text-muted mb-2">Only portrait or square images, 2M max and 2000px max-height.</small>
                            <input name="image3" type="file" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square" data-max-file-size="2M" data-max-height="2000">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox">
                        <label class="form-check-label" for="checkbox">
                            Additional Terms and Conditions <span class="text-danger">*</span>
                        </label>
                        </div>
                    </div>
                    <div class="card-body" id="description" style="display: none;">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <div id="editor">
                                <textarea name="additionalTerms" type="text" class="form-control"></textarea>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="sticky-lg-top">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Pricing Info <span class="text-danger">*</span></h6>
                        </div>
                        <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                            <label  class="form-label">Starting Bid Price</label>
                            <div class="input-group w-100">
                                <span class="input-group-text">₹</span>
                                <input name="startingBidPrice" type="text" class="form-control" placeholder="100">
                            </div>
                            </div>
                            <!-- <div class="col-md-12">
                            <label  class="form-label">Reserve Price</label>
                            <div class="input-group w-100">
                                <span class="input-group-text">₹</span>
                                <input name="reservePrice" type="text" class="form-control" placeholder="500">
                            </div>
                            </div> -->
                            <div class="col-md-12">
                            <label  class="form-label">Bid Increment</label>
                            <div class="input-group w-100">
                                <span class="input-group-text">₹</span>
                                <input name="bidIncrement" type="text" class="form-control" placeholder="10">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Bidding Duration <span class="text-danger">*</span></h6>
                        </div>
                        <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                            <label  class="form-label">Starting Date</label>
                            <input name="startingDate" type="date" class="form-control w-100">
                            </div>
                            <div class="col-md-12">
                            <label  class="form-label">Starting Time</label>
                            <input name="startingTime" type="time" class="form-control w-100">
                            </div>
                            <div class="col-md-12">
                            <label  class="form-label">Ending Date</label>
                            <input name="endingDate" type="date" class="form-control w-100">
                            </div>
                            <div class="col-md-12">
                            <label  class="form-label">Ending Time</label>
                            <input name="endingTime" type="time" class="form-control w-100">
                            </div>
                        </div>
                        </div>
                    </div>
                    <button id="btn2" type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase ">Create</button>
                    <style>
                        #btn1, #btn2 {
                            display: block; /* Display both buttons by default */
                        }
                        @media screen and (max-width: 1199px) {
                            #btn1 {
                            display: none;
                        }
                    }
                    @media screen and (min-width: 1199px) {
                            #btn2 {
                            display: none;
                        }
                    }
        
                    </style>
                    </div>
                </div>
            </div> 
                </form>   
        </div>    
    </div>
@endsection
@section('script')
<script>
        $(document).ready(function() {
        
        
        $("input[name='startingDate'], input[name='startingTime'], input[name='endingDate'], input[name='endingTime']").on("change", function() {
            var startingDate = new Date($("input[name='startingDate']").val() + " " + $("input[name='startingTime']").val());
            var endingDate = new Date($("input[name='endingDate']").val() + " " + $("input[name='endingTime']").val());
            
            var currentDate = new Date();
            var maxEndDate = new Date();
            maxEndDate.setDate(currentDate.getDate() + 3);
            
            if (startingDate <= currentDate) {
                alert("Starting Date and Time cannot be in the past.");
                $("input[name='startingDate']").val("");
                $("input[name='startingTime']").val("");
            } else if (endingDate > maxEndDate) {
                alert("Ending date and time must be within 3 days of the starting date and time.");
                $("input[name='endingDate']").val("");
                $("input[name='endingTime']").val("");
            }
        });

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

        const checkbox = document.getElementById('checkbox');
        const cardBody = document.getElementById('description');

        checkbox.addEventListener('change', function () {
            if (this.checked) {
                cardBody.style.display = 'block';
            } else {
                cardBody.style.display = 'none';
            }
        });
            
    </script>

@endsection