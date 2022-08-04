<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function checkUserType(){
        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                return redirect('/dashboard');
            } else {
                $user = Auth::user();
                return redirect('/');
            }
        }
    }
}
