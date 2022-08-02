<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name' => ['required', 'min:4'],
            'lecturer' => ['required', 'min:4'],
        ]);

        Subject::create($validatedData);
        return redirect()->route('schedule.index')->with('success', 'Mapel berhasil dibuat');
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
        $subject = DB::table('subject')->where('id', $id)->first(['id', 'name', 'lecturer']);
        return response()->json(compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:4'],
            'lecturer' => ['required', 'min:4'],
        ]);

        if ($validatedData) {
            $subject->update($validatedData);
            return response()->json(['success' => true, 'msg' => 'Mapel berhasil diubah'], 200);
        }

        return response()->json(['success' => false, 'msg' => 'Mapel gagal diubah'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->schedules()->delete();
        $subject->delete();

        return redirect()->back()->with('success', 'Mapel berhasil dihapus');
    }
}
