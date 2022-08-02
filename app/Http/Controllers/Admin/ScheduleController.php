<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get(['id', 'location', 'date', 'subject_id']);
        $subjects = DB::table('subject')->get(['id', 'name', 'lecturer']);
        return view('pages.dashboard', compact('schedules', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = DB::table('subject')->get(['id', 'name']);
        return view('pages.create-schedule', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $validatedData = $r->validate([
            'subject_id' => ['required', 'numeric'],
            'location' => ['required'],
            'date' => ['required', 'date'],
        ]);
        $validatedData += ['class_id' => auth()->user()->classId];

        Schedule::create($validatedData);
        return redirect()->route('schedule.index')->with('success', 'Jadwal berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = DB::table('schedule')->where('id', $id)->first(['id', 'subject_id', 'location', 'date']);
        return response()->json(compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'subject_id' => ['required', 'numeric'],
            'location' => ['required'],
            'date' => ['required', 'date'],
        ]);

        if ($validatedData) {
            $schedule->update($validatedData);
            return response()->json(['success' => true, 'msg' => 'Jadwal berhasil diubah'], 200);
        }

        return response()->json(['success' => false, 'msg' => 'Jadwal gagal diubah'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
    }
}
