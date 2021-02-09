<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Visitor;
use App\Wahana;
use App\Employee;
use App\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class TransactionController extends Controller
{

    public function index()
    {
        $dt = DB::table('wahana')
            ->leftJoin('transactions', 'wahana.wahana_id', 'transactions.wahana_id')
            ->leftJoin('visitors', 'transactions.visitor_id', 'visitors.visitor_id')
            ->get();
        return view('transaction.index', compact('dt'));
    }

    public function create()
    {
        $max = Transaction::max('transaction_id');
        $no_urut = (int) substr($max, 9, 9) + 1;
        $kode = "TR" . sprintf("%09s", $no_urut);

        $visitor = Visitor::get();
        $wahana = Wahana::get();

        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('transaction.create', compact('kode', 'visitor', 'wahana', 'authposition', 'authname'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        $validasi = $request->validate([
            'visitor_id' => 'required'

        ]);


        // cek saldo visitor dari database
        $saldo = Visitor::where("visitor_id", $request->visitor_id)->pluck('saldo')->first();

        //dengan query
        // $saldo = Visitor::getVisitorSaldo($request->visitor_id);

        if ($saldo < $request->total) {
            return redirect()->route('transaction.create')->with('Status', 'Saldo pengunjung tidak mencukupi !');
        } else {
            $transaction = Transaction::create([
                'transaction_id' => $request->id,
                'transaction_date' => date("Y-m-d H:i:s"),
                'qty' => $request->qty,
                'total' => $request->total,
                'visitor_id' => $request->visitor_id,
                'wahana_id' => $request->tiket,
                'employee_nik' => $request->session()->get('id')
            ]);
            DB::commit();
            return redirect()->route('transaction.index')->with('Status', 'Data Pegawai berhasil ditambahkan!');
        }
    }


    public function show($id)
    {
        $transaction = DB::table('transactions')
            ->join('visitors', 'visitors.visitor_id', '=', 'transactions.visitor_id')
            ->join('wahana', 'wahana.wahana_id', '=', 'transactions.wahana_id')
            ->select('transactions.*', 'visitors.*', 'wahana.*')
            ->where('transactions.transaction_id', '=', $id)
            ->first();


        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        return view('transaction.show', compact('transaction', 'authposition', 'authname'));
    }



    public function destroy($id)
    {
        $transaction = Transaction::where('transaction_id', '=', $id)->delete();
        return redirect()->route('transaction.index')->with('Status', 'data transaction berhasil dihapus!');
    }
}
