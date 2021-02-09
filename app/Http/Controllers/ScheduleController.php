<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $schedule = DB::table('schedule')->get();
        // dd($schedule);
        return view('schedule.index', compact(['schedule']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wahana = DB::table('wahana')->select('*')->get();
        $staff = DB::table('staff_operators')->select('*')->get();
        return view('schedule.create', compact('wahana', 'staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $save = DB::table('schedule')->insert([
        //     'date' => $request->tanggal,
        //     'wahana_id' => $request->wahana,
        //     'staff_loket_nik' => $request->staff
        // ]);
        $tanggal = $request->tanggal;
        $wahana = $request->wahana;
        $staff = $request->staff;
        $save = DB::insert("insert into schedule (date, wahana_id, staff_loket_nik) values ('$tanggal', '$wahana','$staff')");

        if ($save == TRUE) {
            return redirect()->route('schedule')->with('Status', 'Data jadwal berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $data['wahana'] = DB::table('wahana')->select('*')->get();
        $data['staff'] = DB::table('staff_operators')->select('*')->get();
        $data['schedule'] = DB::table('schedule')
            ->where('date', $date)->first();
        return view('schedule.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Schedule $schedule)
    {
        $update = DB::table('schedule')
            ->where('date', $req->tanggal)
            ->update([
                'date' => $req->tanggal,
                'wahana_id' => $req->wahana,
                'staff_loket_nik' => $req->staff
            ]);
        if ($update == TRUE) {
            return redirect()->route('schedule')->with('Status', 'Data jadwal berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($date, $wahana, $staff)
    {

        $delete = DB::table('schedule')
            ->where('date', $date)
            ->where('wahana_id', $wahana)
            ->where('staff_loket_nik', $staff)->delete();

        // $delete = DB::delete("DELETE FROM schedule WHERE date='$date'");
        if ($delete == TRUE) {
            return redirect()->route('schedule')->with('Status', 'Data jadwal berhasil dihapus');
        }
    }
}
