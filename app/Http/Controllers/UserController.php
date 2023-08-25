<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerificationMail;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class UserController extends Controller
{

    public function viewProfile()
    {
        $sessionUserId = Session::get('user_id'); // Replace 'user_id' with the actual session key

        $user = User::find($sessionUserId);
        $userDetails = UserDetails::where('user_id', $sessionUserId)->first();
        if ($user && $userDetails) {
            return view('user-profile', compact('user', 'userDetails'));
        }

        return redirect()->route('dashboard')->with('error', 'User profile data not found.');
    }




    public function updateProfile(Request $request)
    {
        $sessionUserId = Session::get('user_id'); // Replace 'user_id' with the actual session key

        $user = User::find($sessionUserId);

        if ($user) {
            // Validate input
            $validator = Validator::make($request->all(), [
                'address' => 'required | max:255',
                'city' => 'required',
                'state' => 'required',
                'postal_code' => 'required|digits:6',
                'phone' => 'required|digits:10',
            ]);

            if ($validator->fails()) {
                $validationErrors = implode(', ', $validator->errors()->all());
                $errorMessage = 'Please fix the following errors: ' . $validationErrors;
                return redirect()->back()->with('error', $errorMessage);
            }

            // Update user details
            $userDetails = UserDetails::where('user_id', $user->id)->first();
            if ($userDetails) {
                $userDetails->update([
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'postal_code' => (string) $request->postal_code,
                    'phone' => (string) $request->phone,
                    'gender' => $request->gender,
                    'vpa_id' => $request->vpa_id,
                ]);

                if ($user && $userDetails) {
                    if ($user->email_verified_at !== null && $userDetails->address !== null && $userDetails->city !== null && $userDetails->state !== null && $userDetails->postal_code !== null && $userDetails->phone !== null && $userDetails->gender !== null) {
                        $user->details_updated = '1';
                        $user->save();
                    }
                }


                return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
            }

            return redirect()->route('user.profile')->with('error', 'User details not found.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }

    public function verifyEmail(Request $request)  {
        $user = User::find($request->userId);
        $user->remember_token = Str::random(30);
        $user->save();
        Mail::to($user->email)->send(new EmailVerificationMail($user));
        return response()->json([
                'success' => true,
                'message' => $request->userId
        ]);    
    }

    public function verifyEmailPost($token)
    {
        // Find the user using the remember token
        $user = User::where('remember_token', $token)->first();
        $userDetails = UserDetails::where('user_id', $user->id)->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->save();
            if ($user && $userDetails) {
                if ($user->email_verified_at !== null && $userDetails->address !== null && $userDetails->city !== null && $userDetails->state !== null && $userDetails->postal_code !== null && $userDetails->phone !== null && $userDetails->gender !== null) {
                    $user->details_updated = '1';
                    $user->save();
                }
            }

            // Optionally: Redirect to a success page
            return redirect()->route('user.profile')->with('success', 'Email Verified successfully.');
        } ;
    }

}
