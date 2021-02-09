<?php

namespace App\Http\Controllers;

use App\Tools;
use Illuminate\Http\Request;
use App\Wahana;
use App\Employee;
use App\User;
use App\Position;
use Auth;
use Illuminate\Support\Facades\DB;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = Tools::all();
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('tools.index', compact('tools','authposition','authname'));
    }

   
    public function create()
    {
        $wahana = Wahana::all();
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        $max = Tools::max('tool_id');
        $no_urut = (int) substr($max, 3, 3) + 1;
        $kode = "TS" .sprintf("%03s", $no_urut);

        return view('tools.create', compact('wahana','authposition','authname','kode'));
    }

    
    public function store(Request $request)
    {
        DB::beginTransaction();
        
        $tool = Tools::create([
            'tool_id' => $request->id, 
            'tool_name' => $request->nama, 
            'wahana_id' => $request->wahana,
            'good' => $request->good,
            'broken' => $request->broken,
            'repaired' => $request->repaired

        ]);

        DB::commit();
        return redirect()->route('tools.index')
            ->with('Status', 'Data alat berhasil ditambahkan!');
    }

    
    public function show(Tools $tools)
    {
        //
    }

    
    public function edit($id)
    {
        $tool = Tools::find($id);
        $wahana = wahana::All();
        $authposition = session()->get('id_position');
        $authname = session()->get('name');
        
        return view('tools.edit', compact('tool', 'wahana', 'authposition','authname'));
    }

  
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $tool = Tools::find($id);

        $tool->tool_id= $request->id;
        $tool->wahana_id = $request->wahana;
        $tool->tool_name = $request->nama;
        $tool->good = $request->good;
        $tool->broken = $request->broken;
        $tool->repaired = $request->repaired;
     
        $tool->save();

        DB::commit();
        
        return redirect()
            ->route('tools.index')
            ->with('Status', 'data pegawai berhasil diedit!');

    }

    public function destroy($id)
    {
        $wahana = Tools::where('tool_id','=',$id)->delete();
        return redirect()->route('tools.index')->with('Status', 'data alat berhasil dihapus!');
    }
}
