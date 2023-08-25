@extends('layouts.main')
@section('title','VrinVrog - User Profile')
        @section('main-content')
            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div style="padding:0;" class="card-header  no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Admin Profile</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3">
                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                        <div class="col-xl-4 col-lg-5 col-md-12">
                            <div class="card profile-card flex-column mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Profile</h6>
                                </div>
                                <div class="card-body d-flex profile-fulldeatil flex-column">
                                    <div class="profile-block text-center w220 mx-auto">
                                        <a href="#">
                                            <img src="{{ asset('images/lg/avatar4.svg') }}" alt="" class="avatar xl rounded img-thumbnail shadow-sm">
                                        </a>
                                        <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                            <span class="text-muted small"><span>User ID :</span><span>{{ 'VVAUC'.session('user_id'); }}</span></span>
                                        </div>
                                    </div>
                                    <div class="profile-info w-100">
                                        <h6  class="mb-0  fw-bold d-block fs-6 text-center" id="nameP">{{ session('name'); }}</h6>
                                        <div class="about-info d-flex align-items-center justify-content-center flex-column">
                                            <span class="text-muted small"><span>Account Status : </span>@if ($user->details_updated === '0')
                                                                                                            <span style="color:red;">Not-Updated</span>
                                                                                                        @elseif ($user->details_updated === '1')
                                                                                                            <span style="color:green;">Active</span>
                                                                                                        @endif
                                                                                                        </span>
                                        </div>
                                        <!-- <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">24 years, California</span> -->
                                        <!-- <p class="mt-2" id="detbox">Duis felis ligula, pharetra at nisl sit amet, ullamcorper fringilla mi. Cras luctus metus non enim porttitor sagittis. Sed tristique scelerisque arcu id dignissim.</p> -->
                                        <div class="row g-2 pt-2">
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-ui-touch-phone"></i>
                                                    <span class="ms-2" id="mbleP">@if ($userDetails->phone === null)
                                                                                        Not-Set
                                                                                    @else
                                                                                        {{ $userDetails->phone }}
                                                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-email"></i>
                                                    <span class="ms-2" id="mailP">{{ session('email'); }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Payment Method</h6>
                                </div>
                                <form action="{{ route('user.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                <div class="form-group">
                                                <label class="form-label">Enter Your VPA ID: <span class="text-danger">*</span></label>
                                                <input name="vpa_id" class="form-control" value="{{ $userDetails->vpa_id }}"  type="text">
                                            </div>
                                            <p class="mt-3"><button type="submit" class="btn btn-primary">Save VPA ID</button></p>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0" style="padding:1.2rem">
                                    <h6 class="mb-0 fw-bold ">Profile Settings</h6>
                                </div>
                                <div class="card-body" style="padding:2rem">
                                    <form class="row g-4" action="{{ route('user.update') }}" method="POST">
                                        @csrf
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">User ID</label>
                                                <input name="user_id" class="form-control"  value=" {{ 'VVAUC'.session('user_id'); }}" type="text" id="un-id" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Profile Name</label>
                                                <input name="name" class="form-control" value=" {{ session('name'); }}"  type="text" id="un-inp" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        <div class="col-md-6 col-sm-12">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">@</span>
                                                <input name="email" type="text" id="mailInp" value="{{ session('email'); }}" class="form-control" readonly>
                                                @if(is_null($user->email_verified_at))
                                                <span class="input-group-text"><i class="icofont-warning-alt" style="color: red;"></i></span>
                                            <!-- Display a green tick icon if email_verified_at is not null -->
                                                @else
                                                    <span class="input-group-text"><i class="icofont-tick-boxed" style="color: green;"></i></span>
                                                @endif                                            </div> 
                                          <!-- ##TODO  <i class="icofont-warning-alt" style="color:red;"></i> -->
                                        </div> 
                                        @if(is_null($user->email_verified_at))
                                                    <div class="col-md-6 col-sm-12">
                                                        <label class="form-label" style="color:red;">`<span class="text-danger"></span></label>
                                                        <div class="input-group">
                                                            <button type="button" onclick="VerifyEmail(`{{ session('user_id'); }}`)" class="btn btn-primary text-uppercase px-5" ><strong>Verify</strong></button>
                                                        </div>
                                                    </div>                               
                                        @endif  
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-label"><label for="genderSelect" class="form-label">Select your gender:</label>
                                            <select name="gender" id="genderSelect" class="form-control" >
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select> </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                                <input name="phone" class="form-control" id="mbleInp" value="{{ $userDetails->phone }}" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                <textarea name="address" class="form-control"  aria-label="With textarea">{{ $userDetails->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">City <span class="text-danger">*</span></label>
                                                <input name="city" class="form-control" value="{{ $userDetails->city }}"  type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group form-label">
                                                <label for="stateSelect" class="form-label">States <span class="text-danger">*</span></label>
                                                <select name="state" id="stateSelect" class="form-control">
                                                <option selected readonly> {{ $userDetails->state }} </option>
                                                    <option>Andhra Pradesh</option>
                                                    <option>Arunachal Pradesh</option>
                                                    <option>Assam</option>
                                                    <option>Bihar</option>
                                                    <option>Chhattisgarh</option>
                                                    <option>Goa</option>
                                                    <option>Gujarat</option>
                                                    <option>Haryana</option>
                                                    <option>Himachal Pradesh</option>
                                                    <option>Jammu and Kashmir</option>
                                                    <option>Jharkhand</option>
                                                    <option>Karnataka</option>
                                                    <option>Kerala</option>
                                                    <option>Madhya Pradesh</option>
                                                    <option>Maharashtra</option>
                                                    <option>Manipur</option>
                                                    <option>Meghalaya</option>
                                                    <option>Mizoram</option>
                                                    <option>Nagaland</option>
                                                    <option>Odisha</option>
                                                    <option>Punjab</option>
                                                    <option>Rajasthan</option>
                                                    <option>Sikkim</option>
                                                    <option>Tamil Nadu</option>
                                                    <option>Telangana</option>
                                                    <option>Tripura</option>
                                                    <option>Uttar Pradesh</option>
                                                    <option>Uttarakhand</option>
                                                    <option>West Bengal</option>
                                                    <option>Andaman and Nicobar Islands</option>
                                                    <option>Chandigarh</option>
                                                    <option>Dadra and Nagar Haveli and Daman and Diu</option>
                                                    <option>Delhi</option>
                                                    <option>Lakshadweep</option>
                                                    <option>Puducherry</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Postal Code <span class="text-danger">*</span></label>
                                                <input name="postal_code" class="form-control" value="{{ $userDetails->postal_code }}" type="text">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 mt-4">
                                            <button type="submit" id="saveBtn" class="btn btn-primary text-uppercase px-5">SAVE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
<script>      
    function VerifyEmail(user_id){
        $.ajax({
            url: "{{ route('verify.email') }}", // Replace with the actual server endpoint
            type: "POST", // You can change this to "GET" if needed
            dataType: "json", // Change the data type you're expecting from the server
            
            // You can add any data you want to send to the server in the "data" object
            data: {
                // Example data
                userId: user_id,
            },
            success: function(response) {
                if (response.success === true){
                    console.log(response)
                    window.location.href = `{{ route('verify.email') }}`
                }
                else{
                    console.log(response);
                }
            },
            
            error: function(xhr, status, error) {
                // Handle errors here
                console.log("Error:", error);
            }
        });
    }
</script>