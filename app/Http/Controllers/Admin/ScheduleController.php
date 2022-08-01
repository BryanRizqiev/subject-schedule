<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $subjects = Subject::all();
        return view('pages.dashboard', compact('schedules', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'class_id' => ['required', 'numeric'],
            'location' => ['required'],
            'date' => ['required', 'date'],
        ]);

        Schedule::create($validatedData);
        return redirect()->route('schedule.index')->with('create-subject-success', 'Mapel berhasil dibuat');
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
    public function edit(Schedule $schedule)
    {
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
            $schedule->update($request->all());
            return response()->json(['success' => true, 'msg' => 'Jadwal berhasil diubah'], 200);
        }

        return response()->json(['success' => false, 'msg' => 'Jadwal tidak dapat diubah'], 500);
        // return redirect()->back()->with('update-schedule-success', 'Jadwal berhasil diubah');
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

        return redirect()->back()->with('destroy-schedule-success', 'Jadwal berhasil dihapus');
    }
}
