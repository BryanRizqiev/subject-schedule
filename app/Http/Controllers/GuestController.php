<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest');
    }

    public function show($day)
    {
        $schedules = Schedule::where('date_day', $day)->get(['id', 'location', 'type', 'date', 'subject_id']);
        return response()->json($schedules->map( function($schedule, $key) {
            return [
                'subject' => $schedule->subject->name,
                'location' => $schedule->location,
                'type' => $schedule->type,
                'date' => Carbon::parse($schedule->date)->isoFormat('dddd, D MMMM Y'),
                'date_time' => Carbon::parse($schedule->date)->toTimeString(),
                'date_for_human' => Carbon::parse($schedule->date)->diffForHumans(),
            ];
        }), 200);
    }

    public function showAll()
    {
        $schedules = Schedule::all(['id', 'location', 'type', 'date', 'subject_id']);
        return response()->json($schedules->map( function($schedule, $key) {
            return [
                'subject' => $schedule->subject->name,
                'location' => $schedule->location,
                'type' => $schedule->type,
                'date' => Carbon::parse($schedule->date)->isoFormat('dddd, D MMMM Y'),
                'date_time' => Carbon::parse($schedule->date)->toTimeString(),
                'date_for_human' => Carbon::parse($schedule->date)->diffForHumans(),
            ];
        }), 200);        
    }
}
