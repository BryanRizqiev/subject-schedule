<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
        $visitorCount = DB::table('visitor_counter')->count(['id']);
        $schedules = Schedule::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get(['id', 'location', 'date', 'subject_id']);
        $subjects = DB::table('subject')->get(['id', 'name', 'lecturer']);
        return view('pages.dashboard', compact('schedules', 'subjects', 'visitorCount'));
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
            'description' => ['required', 'min:10'],
            'type' => ['required'],
        ]);
        $validatedData += ['class_id' => auth()->user()->classId];
        $validatedData += ['date_day' => Carbon::parse($r->date)->format('D')];

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
        $schedule = Schedule::where('id', Crypt::decryptString($id))->first(['id', 'subject_id', 'location', 'date']);
        return response()->json([
            'id' => Crypt::encryptString($schedule->id),
            'subject_id' => $schedule->subject_id, 
            'location' => $schedule->location, 
            'date' => $schedule->date, 
        ] ,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //perlu optimasi
        $schedule = Schedule::findOrFail(Crypt::decryptString($id));
        $validatedData = $request->validate([
            'subject_id' => ['required', 'numeric'],
            'location' => ['required'],
            'date' => ['required', 'date'],
        ]);
        
        $validatedData += ['date_day' => Carbon::parse($request->date)->format('D')];

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
