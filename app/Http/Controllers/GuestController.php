<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $schedules = Schedule::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get(['id', 'location', 'date', 'subject_id']);
        return view('guest', compact('schedules'));
    }

    public function show($day)
    {
        $schedules = Schedule::where('date', $day)->get(['id', 'location', 'date', 'subject_id']);
        return response()->json(compact('schedules'), 200);
    }
}
