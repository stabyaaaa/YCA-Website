<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventDashboardController extends Controller
{
    public function index()
{
    return view('event.admin.dashboard');
}
}
