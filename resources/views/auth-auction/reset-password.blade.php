<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VrinVrog - Reset Password</title>
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5 ">
            
            <!-- Body: Body -->
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-xxl">

                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                            <div style="max-width: 25rem;">
                                <div class="text-center">
                                    <img src="{{asset('images/logo1.png')}}" alt="login-img" style="width: 50vh;">
                                </div>
                                <div class="mb-5">
                                    <h2 class="color-900 text-center">A few clicks is all it takes.</h2>
                                </div>
                                <!-- Image block -->
                                <div class="">
                                    <img src="{{asset('images/login-img.svg')}}" alt="login-img">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->
                                <form class="row g-1 p-3 p-md-4" method="POST" >
                                @csrf
                                    <div class="col-12 text-center mb-3">
                                    <h3 class="fw-bold">VrinVrog Auction</h3>
                                        <span>Reset Your Password.</span>
                                    </div>
                                    @if(session('message'))
                                        <div class="alert alert-success">{{ session('message') }}</div>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Email address</label>
                                            <input name="email" type="text" class="form-control form-control-lg" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <div class="form-label">
                                                <span class="d-flex justify-content-between align-items-center">
                                                    Password
                                                </span>
                                            </div>
                                            <div class="input-group">
                                                <input id="password" name="password" type="password" class="form-control form-control-lg" placeholder="8+ characters required">
                                                <span id="showPassword" class="input-group-text" style="cursor: pointer;"><i id="showPasswordIcon" class="icofont-eye"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <div class="form-label">
                                                <span class="d-flex justify-content-between align-items-center">
                                                    Confirm Password
                                                </span>
                                            </div>
                                            <input  name="confirm_password" type="text" class="form-control form-control-lg" placeholder="***************">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-lg btn-block btn-light lift" name="signin">Reset Password</button>
                                    </div>
                                </form>
                                <!-- End Form -->
                                
                            </div>
                        </div>
                    </div> <!-- End Row -->
                    
                </div>
            </div>

        </div>

    </div>
</body>
</html>
<script>
    let showPassword = document.getElementById("showPassword");
        let pass = document.getElementById("password");
        let showPasswordIcon = document.getElementById("showPasswordIcon");
        showPassword.onclick = function() {
            showPasswordIcon.classList.toggle("icofont-eye");
            showPasswordIcon.classList.toggle("icofont-eye-blocked");
            if (pass.type=='password'){
                pass.type='text';
            }else{
                pass.type='password';
            }
        }
</script>