<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('frontend.home');
    }

    public function user_profile()
    {
        if (Auth::check())
        {
            $user_profile = User::find(Auth::user()->id);
            return view('frontend.user.user_profile', compact('user_profile'));
            
        }
 
    }
    
}
