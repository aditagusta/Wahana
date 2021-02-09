<?php

namespace App\Http\Controllers;

use App\HistoryRepair;
use Illuminate\Http\Request;
use App\Tools;
use App\Employee;
use App\User;
use App\Position;
use Auth;
use Illuminate\Support\Facades\DB;


class HistoryRepairController extends Controller
{
    
    public function index()
    {
        $repair = HistoryRepair::all();
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('history_repair.index', compact('repair','authposition','authname'));
    }

  
    public function create()
    {
        $tool = Tools::all();
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        $max = HistoryRepair::max('repair_id');
        $no_urut = (int) substr($max, 3, 3) + 1;
        $kode = "HR" .sprintf("%03s", $no_urut);

        return view('history_repair.create', compact('tool','authposition','authname','kode'));
    }

    
    public function store(Request $request)
    {
        DB::beginTransaction();
        
        $repair = HistoryRepair::create([
            'repair_id' => $request->id, 
            'id_tool' => $request->tool, 
            'date_start' => $request->tanggal_awal,
            'ket' => $request->ket
        ]);

        DB::commit();
        return redirect()->route('repair.index')
            ->with('Status', 'Data perbaikan berhasil ditambahkan!');
    }

    
    public function show(HistoryRepair $historyRepair)
    {
        //
    }

    
    public function edit($id)
    {
        $repair = HistoryRepair::find($id);
        $tool = Tools::All();
        $authposition = session()->get('id_position');
        $authname = session()->get('name');


        return view('history_repair.edit', compact('repair', 'tool', 'authposition','authname'));
    }

    
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $repair = HistoryRepair::find($id);

        $repair->repair_id= $request->id;
        $repair->date_start = $request->tanggal_awal;
        $repair->date_end = $request->tanggal_akhir;
        $repair->ket = $request->ket;

        $repair->save();

        DB::commit();
        
        return redirect()
            ->route('repair.index')
            ->with('Status', 'ata perbaikan berhasil diubah!');
    }

    
    public function destroy(HistoryRepair $id)
    {
        $repair = HistoryRepair::where('repair_id','=',$id)->delete();
        return redirect()->route('repair.index')->with('Status', 'Data perbaikan berhasil dihapus!');
    }
}
