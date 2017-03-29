<?php

namespace App\Http\Controllers;

use App\Hostels;
use App\Payment;
use App\Rooms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        $rooms = Rooms::count('id');
        $tenants = User::where('role','Tenant')->count('id');
        $hostels = Hostels::count('id');
        $cash = Payment::sum('amount');
        if ($role == 'Tenant'){
            return view('front.welcome');
        }else{
            return view('home',compact('rooms','hostels','tenants','cash'));
        }
    }
}
