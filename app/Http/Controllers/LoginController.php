<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{


    // Redirecting the Google sign in Page To Oauth 2.0 Page

    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }

    // Functiion To Handle The Callback (User Details) From Google Oauth 2.0
    
    public function handleGoogleCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->stateless()->user();
    
            // Check if the user already exists based on their email
            $existingUser = User::where('email', $socialUser->email)->first();
    
            if ($existingUser) {
                // Update the user's Google ID if not already set
                if (!$existingUser->google_id) {
                    User::where('email', $socialUser->email)
                    ->whereNull('google_id') // To update only if google_id is null
                    ->update(['google_id' => $socialUser->id]);
                }
    
                Auth::login($existingUser);
            } else {
                // Create a new user with Google details
                $newUser = new User();
                $newUser->name = $socialUser->name;
                $newUser->email = $socialUser->email;
                $newUser->google_id = $socialUser->id;
                $newUser->save();
    
                Auth::login($newUser);
            }

            // Storing Session Variables For Further Usages

            session(['name' => $socialUser->name]);
            session(['email' => $socialUser->email]);
            session(['role' => $socialUser->details_updated]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    // Redirecting the Twiiter sign in Page To Oauth 2.0 Page --> (current down - Want to change it to Facebook)

    public function loginWithTwitter(){
        return Socialite::driver('twitter-oauth-2')->redirect();
    }

    public function handleTwitterCallback(){
        try{
            $user = Socialite::driver('twitter-oauth-2')->stateless()->user();
            if (!$user->getEmail()) {
                return redirect()->route('auth.login')->with('error', 'Twitter account does not have an email. Please use a different login method.');
            }
            dd($user);
        } catch (\Throwable $th){
            dd($th);
        }
    }

    // Function for handling the registration details from registration form and creating a new user

    public function submitRegistration(Request $request)
    {
        // Validator -> Validates the data recieved from the request and proccess it 
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
           // 'accept_terms' => 'accepted',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // error is sent if validation fails
        }
        
            // Create user or perform other actions using $request->all()
        
            $userData = $request->all();

        // Create the user using the validated data
        $user = User::create([
            'name' => $userData['full_name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']), // Make sure to hash the password
        ]);

        // Optionally, you can perform additional actions here, such as sending notifications,
        // assigning roles, etc.
        response()->json(['message' => 'User created successfully'], 201);

        return redirect()->route('auth.login')->with('message','Account Created. Login to Continue'); 
    }
    
    // Function to handle the login pages for user authentication

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        $user = User::where('email', $credentials['email'])->first();
        
        if ($user && Hash::check($credentials['password'], $user->password)) { //Check the entered password with the stored password
            Auth::login($user);

            // Store the users sessions data

            session(['name' => $user->name]);
            session(['email' => $user->email]);
            session(['role' => $user->details_updated]);
            return redirect()->route('dashboard');
        }
        
        return redirect()->back()->with('error', 'Invalid Credentials.');
    }

    // Forgot Password Post Request

    public function forgotPassword(Request $request)  {
        $user = User::GetEmailSingle($request->email); 
        if ( ! empty ($user) ){
            $user->remember_token = Str::random(15);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('message', 'Please check your email and Reset your password');
        }
        else{
            return redirect()->back()->with('error', 'Email Address is not registered');
        }
    }

    // Reset Password  Request

    public function resetPassword($token,Request $request)  {
        $user = User::GetTokenSingle($token); 
        if ( ! empty ($user) ){
            //dd($user,$token);
            $data['user'] = $user;
            return view('/auth-auction/reset-password',$data);    
        }
        else{
                abort(404);
        }
    }

     // Reset Password Post Request

     public function resetPasswordPost($token,Request $request)  {
        if ($request->password == $request->confirm_password){
            $user = User::GetTokenSingle($token); 
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('auth.login')->with('message',"Password Reset Succesfully. Login to Continue");
        }
        else{
            return redirect()->back()->with('error', "Password doesn't match with Confirm Password");
        }
    }


    // Function for logout feature 

    public function logout()
    {
        Auth::logout();
        session()->forget(['name', 'email','role']);  // Clear all the loaded session data
        return redirect('/');
    }



}

