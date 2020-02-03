<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {

        return view('dashbord.index');
    }
}
