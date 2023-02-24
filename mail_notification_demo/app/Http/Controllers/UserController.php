<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUser;
use App\Models\User;
use App\Notifications\WelcomeUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register_user(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name|min:5|alpha',
            'email' => 'required|unique:users,email|email|max:40',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $format = [
            'greeting' => 'Welcome ' . $user->name . ',',
            'body' => 'Hello How Are You',
            'thanks' => 'Thank you for Registrations in our Application',
        ];

        Mail::to($request->email)->cc(['hiteshrupavatiya.23@gmail.com'])->send(new WelcomeUser($user));

        Notification::send($user, new WelcomeUserNotification($format));

        return redirect()->back()->with('success', 'User Register Successully Please Check Your Email');
    }
}
