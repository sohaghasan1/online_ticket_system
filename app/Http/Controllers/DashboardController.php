<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        return view('dashboard.pages.dashboard');
    }

    public function orders(){
        $orders = SeatAllocation::all();
        return view('dashboard.pages.orders.order_list', compact('orders'));
    }
}
