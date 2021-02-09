<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffWahana;
use App\Employee;
use App\Wahana;

class StaffWahanaController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date', date("Y-m-d"));
        $wahana_id = $request->input('wahana_id', "0");
        $wahana = Wahana::all();
        $employee = [];
        $jadwal = [];
        if($wahana_id != "0")
        {
            $jadwal = StaffWahana::with(["wahana", "employee"])->where("wahana_id", $wahana_id)->where("date", $date)->get();
            $employee = Employee::whereNotIn("employee_nik", StaffWahana::select("employee_nik")->where("date", $date)->get())->get();
        }
        else
        {
            $jadwal = StaffWahana::with(["wahana", "employee"])->where("date", $date)->get();
        }
        
        return view('staffwahana.index', compact("date", "wahana", "wahana_id", "employee", "jadwal"));
    }

    public function store(Request $request)
    {
        StaffWahana::create([
            "wahana_id" => $request->input("wahana_id"),
            "date" => $request->input("date"),
            "employee_nik" => $request->input("employee_nik")
        ]);

        return redirect("staff-wahana?date=".$request->input("date")."&wahana_id=".$request->input("wahana_id"));
    }

    public function delete(Request $request, $employee_nik)
    {
        $date = $request->input("date", date("Y-m-d"));
        $wahana_id = $request->input("wahana_id", "0");
        StaffWahana::deleteStaffWahana($employee_nik, $wahana_id, $date);
        return redirect("staff-wahana?date=".$date."&wahana_id=".$wahana_id);
    }
}
