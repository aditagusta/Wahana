<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class EmployeeController extends Controller
{
    // public function __construct()
    // {
    //     $this->rules = array(
    //         'employee_nik' =>  'required|unique:employees,employee_nik',
    //         'username' => 'required|unique:employees',
    //         'password' => 'required|min:8'
    //     );
    //     $this->message = array(
    //         'unique' => 'Data Telah Tersedia Silahkan Perhatikan Inputan'
    //     );
    // }

    public function index()
    {
        $employee = Employee::all();

        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('employee.index', compact('employee', 'authposition', 'authname'));
    }


    public function create()
    {

        $position = Position::all();

        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('employee.create', compact('position', 'authposition', 'authname'));
    }


    public function store(Request $request)
    {
        // DB::beginTransaction();
        // $this->validate($request, [
        //     'nik' => ['required', 'unique:employees,employee_nik'],
        //     'username' => ['required', 'unique:employees'],
        //     'password' => ['required', 'min:8'],
        // ]);
        $validator = Validator::make($request->all(), [
            'employee_nik' => ['required', 'unique:employees'],
            'username' => ['required', 'unique:employees'],
            'password' => ['required', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect('/employee/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $employee = Employee::create([
                'employee_nik' => $request->employee_nik,
                'employee_name' => $request->nama,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->alamat,
                'id_position' => $request->jabataan,
                'username' => $request->username,
                'password' => Hash::make($request['password']),
                'status' => 1,
            ]);
            return redirect()->route('employee.index')
                ->with('Status', 'Data Pegawai berhasil ditambahkan!');
        }
        // DB::commit();

        // $validator = Validator::make($request->all(), $this->rules);
        // if ($validator->fails()) {
        //     return redirect('/employee/create')
        //         ->withErrors($validator)
        //         ->withInput();
        // } else {
        //     DB::table('employees')->insert([
        //         'employee_nik' => $request->nik,
        //         'employee_name' => $request->nama,
        //         'gender' => $request->gender,
        //         'phone' => $request->phone,
        //         'address' => $request->alamat,
        //         'id_position' => $request->jabataan,
        //         'username' => $request->username,
        //         'password' => Hash::make($request['password']),
        //         'status' => 1,
        //     ]);
        //     return redirect()->route('employee.index')
        //         ->with('Status', 'Data Pegawai berhasil ditambahkan!');
        // }
    }


    public function show($id)
    {
        $employee = DB::table('employees')
            ->join('positions', 'positions.position_id', '=', 'employees.id_position')
            ->select('employees.*', 'positions.position_name')
            ->where('employees.employee_nik', '=', $id)
            ->first();

        $authposition = session()->get('id_position');
        $authname = session()->get('name');
        // $employee = Employee::find($id);

        return view('employee.show', compact('employee', 'authposition', 'authname'));
    }


    public function edit($id)
    {
        $employee = Employee::find($id);
        $position = Position::All();

        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('/employee.edit', compact('employee', 'position', 'authposition', 'authname'));
    }


    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        $employee = Employee::find($id);

        $employee->employee_nik = $request->NIK;
        $employee->employee_name = $request->nama;
        $employee->gender = $request->gender;
        $employee->phone = $request->hp;
        $employee->address = $request->alamat;
        $employee->id_position = $request->jabataan;
        $employee->username = $request->username;
        if (!empty($request->password)) {
            $employee->password = Hash::make($request->password);
        }
        $employee->status = $request->status;

        $employee->save();

        DB::commit();

        return redirect()
            ->route('employee.index')
            ->with('Status', 'data pegawai berhasil diedit!');
    }


    public function destroy($id)
    {

        $user = User::where('id', '=', $id)->delete();
        $employee = Employee::where('employee_nik', '=', $id)->delete();

        return redirect()
            ->route('employee.index')
            ->with('Status', 'data pegawai berhasil dihapus!');
    }
}
