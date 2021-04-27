<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $schedule = DB::table('schedule')->join('wahana', 'schedule.wahana_id', 'wahana.wahana_id')->join('employees', 'schedule.staff_loket_nik', 'employees.employee_nik')->get();
        $operator = DB::table('employees')->where('id_position', 'KS8')->get();
        // dd($schedule);
        return view('schedule.index', compact(['schedule', 'operator']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wahana = DB::table('wahana')->select('*')->get();
        $emp = DB::table('employees')->where('id_position', 'KS4')->select('*')->get();
        $opr = DB::table('employees')->where('id_position', 'KS8')->select('*')->get();
        return view('schedule.create', compact('wahana', 'emp', 'opr'));
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

        $cek_user = DB::table('schedule')
            ->where('date', $request->tanggal)
            ->where('staff_loket_nik', $request->staff_loket_nik)
            ->get();

        $cek_wahana = DB::table('schedule')
            ->where('date', $request->tanggal)
            ->where('wahana_id', $request->wahana)
            ->get();

        if (count($cek_user) == 0) {
            if (count($cek_wahana) == 0) {
                $save = DB::table('schedule')->insert([
                    'date' => $request->tanggal,
                    'wahana_id' => $request->wahana,
                    'staff_loket_nik' => $request->staff_loket_nik
                ]);
                if ($save == TRUE) {
                    return redirect()->route('schedule')->with('Status', 'Data jadwal berhasil ditambahkan');
                }
            } else {
                return redirect()->route('create_schedule')->with('Status', 'Data jadwal sudah ada');
            }
            return redirect()->route('create_schedule')->with('Status', 'Data jadwal sudah ada');
        } else {
            return redirect()->route('create_schedule')->with('Status', 'Data jadwal sudah ada');
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
    public function edit($date, $wahana)
    {
        $data['wahana'] = DB::table('wahana')->select('*')->get();
        $data['employee'] = DB::table('employees')->where('id_position', 'KS4')->get();
        $data['operator'] = DB::table('employees')->where('id_position', 'KS8')->get();
        $data['schedule'] = DB::table('schedule')
            ->where('date', $date)
            ->where('wahana_id', $wahana)
            ->first();
        return view('schedule.edit', $data);
    }

    public function operator(Request $r)
    {
        $data['operator'] = DB::table('employees')->where('id_position', 'KS8')->get();
        return view("schedule.tambah_operator", $data);
    }

    public function getopr(Request $r)
    {
        // dd($r->all());

        $data = DB::table('staff_operators')
            ->where('date', $r->date)
            ->where('wahana_id', $r->wahana_id)
            ->select('staff_operator_nik')
            ->get();

        if (count($data) > 0) {
            echo json_encode($data);
        } else {
            $data = '';
            echo json_encode($data);
        }
    }

    public function addoperator(Request $r)
    {
        // dd($r->date_);
        // dd($r->all());
        $date = $r->date_;
        $wahana = $r->wahana_;
        $nama = $r->nama;


        if ($nama != null) {
            // dd($nama);
            DB::table('staff_operators')
                ->where('date', $date)
                ->where('wahana_id', $wahana)
                ->delete();


            foreach ($nama as $no => $a) {
                // cari apakah user tealah bekerja
                $cek_user = DB::table('staff_operators')
                    ->where('date', $date)
                    ->where('staff_operator_nik', $a)
                    ->get();

                $cek_wahana = DB::table('staff_operators')
                    ->where('wahana_id', $wahana)
                    ->where('staff_operator_nik', $a)
                    ->get();

                // jika belum
                if (count($cek_user) == 0) {
                    if (count($cek_wahana) == 0) {
                        // dd('ateh');
                        $simpan = DB::statement("INSERT INTO `staff_operators`(`date`, `wahana_id`, `staff_operator_nik`) VALUES ('$date','$wahana','$a')");
                    }
                }
            }
        } else {
            DB::table('staff_operators')
                ->where('date', $date)
                ->where('wahana_id', $wahana)
                ->delete();
            return redirect()->route('schedule')->with('Status1 ', 'Data operator berhasil ditambahkan');
        }
        return redirect()->route('schedule')->with('Status1 ', 'Data operator berhasil ditambahkan');


        // $nama = implode(',', $r->nama);
        // dd($nama);
        // dd($simpan);
        // if ($simpan == true) {

        // }
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
        // dd($req->all());
        $date = $req->tanggal;
        $wahana = $req->wahana;
        $staff = $req->staff;
        // $update = DB::statement("UPDATE `schedule` set `staff_loket_nik` = '$staff' where `date` = '$date' and `wahana_id` = '$wahana'");
        // // dd($update);
        // if ($update == TRUE) {
        //     return redirect()->route('schedule')->with('Status', 'Data jadwal berhasil diubah');
        // }

        $cek_user = DB::table('schedule')
            ->where('date', $req->tanggal)
            ->where('staff_loket_nik', $req->staff_loket_nik)
            ->get();

        $cek_wahana = DB::table('schedule')
            ->where('date', $req->tanggal)
            ->where('wahana_id', $req->wahana)
            ->get();

        if (count($cek_user) == 0) {
            if (count($cek_wahana) == 0) {
                $update = DB::statement("UPDATE `schedule` set `staff_loket_nik` = '$staff' where `date` = '$date' and `wahana_id` = '$wahana'");
                if ($update == TRUE) {
                    return redirect()->route('schedule')->with('Status', 'Data jadwal berhasil diubah');
                }
            } else {
                return redirect()->route('schedule')->with('Status', 'Data jadwal sudah ada');
            }
            return redirect()->route('create_schedule')->with('Status', 'Data jadwal sudah ada');
        } else {
            return redirect()->route('create_schedule')->with('Status', 'Data jadwal sudah ada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($date, $wahana)
    {

        $delete = DB::table('schedule')
            ->where('date', $date)
            ->where('wahana_id', $wahana)->delete();

        // $delete = DB::delete("DELETE FROM schedule WHERE date='$date'");
        if ($delete == TRUE) {
            return redirect()->route('schedule')->with('Status', 'Data jadwal berhasil dihapus');
        }
    }
}
