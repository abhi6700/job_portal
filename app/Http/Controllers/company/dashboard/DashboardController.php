<?php

namespace App\Http\Controllers\company\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('company.dashboard.dashboard');
    }
}
