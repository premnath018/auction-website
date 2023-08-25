<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VrinVrog - Verfication Mail</title>
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5">
            
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
                                <form class="row g-1 p-3 p-md-4">
                                    <div class="col-12 text-center mb-4">
                                        <img src="{{asset('images/email-verification.webp')}}" class="w240 mb-4" alt="">
                                        <h5>Verification Email Sent</h5>
                                        <span class="">Verification Email is sent to your account email, Click the Verfication link to verify your email.</span>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a href="{{  route('dashboard')  }}" title="" class="btn btn-lg btn-block btn-light lift text-uppercase">Back to Home</a>
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