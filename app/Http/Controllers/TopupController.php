<?php

namespace App\Http\Controllers;

use App\HistoryTopup;
use Illuminate\Http\Request;
use App\Visitor;
use App\Employee;
use App\Position;
use Illuminate\Support\Facades\DB;
use Auth;

class TopupController extends Controller
{
    public function index()
    {
        $topup = HistoryTopup::all();

        
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('topup.index', compact('topup', 'authposition', 'authname'));
    }

    public function history_topupprint(Request $request)
    {
        $topup = HistoryTopup::where('topup_id', '=', $request->id)->first();

        
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('topup.print', compact('topup', 'authposition', 'authname'));
    }

    
    public function create()
    {
        $max = HistoryTopup::max('topup_id');
        $no_urut = (int) substr($max, 9, 9) + 1;
        $kode = "TP" .sprintf("%09s", $no_urut);

        $visitor = Visitor::get();
        $employee = Employee::get();

        
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('topup.create', compact('kode', 'visitor', 'employee', 'authposition', 'authname'));
    }

    
    public function store(Request $request)
    {
        DB::beginTransaction();

        $validasi = $request->validate([
            'visitor_id' => 'required'
            
        ]);

        $topup = HistoryTopup::create([
            'topup_id' => $request->id,
            'topup_date' => date(now()),
            'amount' => $request->amount,
            'id_visitor' => $request->visitor_id,
            'employee_nik' => $request->pegawai
        ]);

        DB::commit();
        return redirect()->route('topup.index')->with('Status', 'Data Top Up berhasil ditambahkan!');
    }

    
    public function destroy($id)
    {
        $employee = HistoryTopup::where('topup_id', '=', $id)->delete();
        return redirect()->route('topup.index')->with('Status', 'data history_topup berhasil dihapus!');
    }

    
}
