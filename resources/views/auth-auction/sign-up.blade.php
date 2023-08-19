<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VrinVrog - Sign Up</title>
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                <form id="registrationForm" action="{{route('submit.registration')}}" method="POST" class="row g-1 p-3 p-md-4">
                                <div class="col-12 text-center mb-3">
                                    <h3 class="fw-bold">VrinVrog Auction</h3>
                                        <span>Sign in to access our dashboard.</span>
                                    </div>
                                    @csrf
                                    <div id="errorContainer" class="alert alert-danger" style="display: none;"></div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Full name</label>
                                            <input name="full_name" type="text" class="form-control form-control-lg" placeholder="John">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Email address</label>
                                            <input name="email" type="email" class="form-control form-control-lg" placeholder="name@example.com">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control form-control-lg" placeholder="8+ characters required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Confirm password</label>
                                            <input name="password_confirmation" type="password" class="form-control form-control-lg" placeholder="8+ characters required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input name="accept_terms" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I accept the <a href="#" title="Terms and Conditions" class="text-secondary">Terms and Conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">SIGN UP</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <span>Already have an account? <a href="{{ route('auth.login') }}" title="Sign in" class="text-secondary">Sign in here</a></span>
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
    $(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        event.preventDefault();

        let form = $(this);
        let formData = new FormData(form[0]);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response.message);
                // Handle success, show a success message, redirect, etc.
            },
            error: function(error) {
                if (error.responseJSON) {
                    let errors = error.responseJSON.errors;
                    if (errors) {
                        $('#errorContainer').css('display', 'block');
                        displayErrors(errors);
                    }
                }
            }
        });
    });

    function displayErrors(errors) {
        let errorContainer = $('#errorContainer');
        errorContainer.empty();

        for (let field in errors) {
            let errorMessages = errors[field].join('<br>');
            let errorElement = $('<div>').html(`<strong>${field}:</strong><br>${errorMessages}`);
            errorContainer.append(errorElement);
        }
    }
});

</script>