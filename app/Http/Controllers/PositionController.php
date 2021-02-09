<?php

namespace App\Http\Controllers;

use App\Position;
use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Auth;

class PositionController extends Controller
{
    
    public function index()
    {

        $position = Position::all();

        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('position.index', compact('position','authposition','authname'));
    }

    
    public function create()
    {
        $max = Position::all();

        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view ('position.create',compact('max','authposition','authname'));
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        $validasi = $request -> validate([
            'nama'=> 'required',
            
       ]);

       $position = Position::create([
            'position_id' => $request->id,
            'position_name' => $request->nama,
       ]);

       return redirect()->route('position.index')->with('Status', 'data jabatan berhasil ditambahkan!');
    }

    
    public function edit($id)
    {

        $position = Position::find($id);
        $authposition = session()->get('id_position');
        $authname = session()->get('name');



        return view ('/position.edit',compact('position' ,'authposition','authname'));
    }

    
    public function update(Request $request, $id)
    {
        $position = Position::find($id);
        
        $position->position_name = $request->nama;
        
        $position->save();



       return redirect()->route('position.index')->with('Status', 'data jabatan berhasil diedit!');
    }


    public function destroy($id)
    {
        $position=Position::where('position_id','=',$id)->delete();
        return redirect()->route('position.index')->with('Status', 'data jabatan berhasil dihapus!');
    }
}
