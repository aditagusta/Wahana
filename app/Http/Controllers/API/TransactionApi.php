<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Visitor;
use App\Wahana;
use App\Employee;
use App\Position;
use Illuminate\Support\Facades\DB;
use Auth;


class TransactionApi extends Controller
{
 	public function index(Request $request, $id_visitor = null)
   {
        if($id_visitor != null)
        {
            $transaction = Transaction::select("*")->where("visitor_id", $id_visitor)->join("wahana", "wahana.wahana_id", "=", "transactions.wahana_id")->get();
        }
        else
        {
            $transaction = Transaction::select("*")->join("wahana", "wahana.wahana_id", "=", "transactions.wahana_id")->get();
        }

        return response()->json(ResponseOk($transaction));
   }  

    public function store(Request $request)
    {
       DB::beginTransaction();

        $max = Transaction::max('transaction_id');
        $no_urut = (int) substr($max, 9, 9) + 1;
        $kode = "TR" .sprintf("%09s", $no_urut);

        // cek saldo visitor
        $saldo = Visitor::where("visitor_id", $request->visitor_id)->pluck('saldo')->first();

        if($saldo < $request->total)
        {
	        return response()->json(ResponseError('Saldo pengunjung tidak mencukupi!'));
        }
        else
        {
            $transaction = Transaction::create([
                'transaction_id' => $kode,
                'transaction_date' => date("Y-m-d H:i:s"),
                'qty'=>$request->qty,
                'total' =>$request->total,
                'visitor_id' => $request->visitor_id,
                'wahana_id' => $request->wahana_id,
                'employee_nik' => $request->employee_nik
           ]);
           DB::commit();
	       return response()->json(ResponseOk('Pembayaran berhasil!'));
        }


    }
}
