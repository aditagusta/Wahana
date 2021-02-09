<?php

namespace App\Http\Controllers;

use App\StaffOperator;
use Illuminate\Http\Request;
use DB;

class StaffOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('staff_operators')->get();
        return view('staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wahana = DB::table('wahana')->get();
        $employees = DB::table('employees')->get();
        return view('staff.create', compact('wahana', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = $request->tanggal;
        $wahana = $request->wahana;
        $staff = $request->staff;
        $save = DB::insert("insert into staff_operators (date, wahana_id, staff_operator_nik) values ('$tanggal', '$wahana','$staff')");

        if ($save == TRUE) {
            return redirect()->route('so')->with('Status', 'Data staff operator berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaffOperator  $staffOperator
     * @return \Illuminate\Http\Response
     */
    public function show(StaffOperator $staffOperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StaffOperator  $staffOperator
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffOperator $staffOperator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaffOperator  $staffOperator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffOperator $staffOperator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaffOperator  $staffOperator
     * @return \Illuminate\Http\Response
     */
    public function destroy($date, $wahana, $staff)
    {
        $delete = DB::table('staff_operators')
            ->where('date', $date)
            ->where('wahana_id', $wahana)
            ->where('staff_operator_nik', $staff)->delete();
        if ($delete == TRUE) {
            return redirect()->route('so')->with('Status', 'Data staff operator berhasil dihapus');
        }
    }
}
