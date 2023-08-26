@extends('layouts.main')
@section('title','VrinVrog - Home')
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
                            <div class="card-body text-center " style="padding:0.2rem; padding-bottom: 0.8em;">
                                
                                <div role="alert" class="alert alert-primary" style="background-color: rgb(114, 88, 219); text-align: start; display: flex; flex-direction: column;">
                                    <strong style="color:white; margin-bottom:0; font-size: 2.5rem;">Welcome, {{ session('name') }}</strong>
                                @if(session('name') == 0)  
                                    <span style="color:white;">
                                        <p style="margin:0 0rem 0.5rem 0;">Update your profile and join the auction and Placing your bids. </p>
                                        <a href="{{ route('user.profile') }}" class="btn btn-primary border lift mt-1" style="background-color: white; color:rgb(114, 88, 219);" >Update Your Profile</a>
                                     </span>
                                @else
                                <span style="color:white;">
                                        <p style="margin:0 0rem 0.5rem 0;">Join the auction fun by placing your bids. </p>
                                        <a href="{{ route('user.profile') }}" class="btn btn-primary border lift mt-1" style="background-color: white; color:rgb(114, 88, 219);" >Place Your Biddings</a>
                                     </span>
                                @endif
                                </div><img src="{{asset('images/Welcome.jpg')}}" class="img-fluid mx-size" alt="No Data">
                            </div>
                            <div class="card-body text-center" style="padding-top: 0.8rem; display: grid; place-items: center; ">
                                <a href="guide.html" class="btn btn-white border lift mt-1" style="margin-bottom: 1rem;">Get Guide</a>
                                <a href="product-grid.html" class="btn btn-primary border lift mt-1" >View Products</a>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Contact Us</h6> 
                            </div>
                            <div class="card-body">
                                <form id="sheetform" action="https://sheetdb.io/api/v1/xcmqrrb03s3mw" method="post">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label for="firstname" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="firstname" name="data[NAME]" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label  class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phonenumber" name="data[PHONE NUMBER]" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="emailaddress" class="form-label" >Email Address</label>
                                            <input type="email" class="form-control" id="emailaddress" name="data[EMAIL-ADDRESS]" required>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <label for="admitdate" class="form-label">Date</label>
                                            <input type="date" class="form-control w-100" id="admitdate" name="data[DATE]" required>
                                        </div> -->
                                        <!-- <div class="col-md-6">
                                            <label  class="form-label">Gender</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios11" value="option1" checked>
                                                        <label class="form-check-label" for="exampleRadios11">
                                                        Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios22" value="option2">
                                                        <label class="form-check-label" for="exampleRadios22">
                                                        Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-12">
                                            <label for="addnote" class="form-label">Add Note</label>
                                            <textarea  class="form-control" id="addnote" rows="3" name="data[ADD NOTE]"></textarea> 
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endsection
      
 