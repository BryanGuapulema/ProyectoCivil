<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->usertype == 'user')
        {
            return view('dashboard');
        }
        else if(Auth::user()->usertype == 'teacher')
        {
            return view('teacher.home');
        }
        else if(Auth::user()->usertype == 'admin')
        {
            return view('admin.home');
        }
    }


    public function page()
    {
        return view('adminpage');
    }
}
