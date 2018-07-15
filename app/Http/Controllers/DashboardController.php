<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// User Model
use App\User;

// Dashboard Controller
class DashboardController extends Controller
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
        $userId = auth()->user()->id;

        $user = User::find($userId);

        return view('dashboard')->with('listings', $user->listings);
    }
}
