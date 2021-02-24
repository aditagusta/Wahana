<?php

namespace App\Http\Controllers;

use App\HistoryTopup;
use App\Transaction;
use App\Employee;
use Illuminate\Http\Request;
use Auth;
use DB;
use Dompdf\Dompdf;

class ReportController extends Controller
{
    public function history_topupindex(Request $request)
    {
        $html_report = "";
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        if ($request->type == 'search') {
            $topup = HistoryTopup::whereBetween(DB::raw('DATE(topup_date)'), [$request->date_start, $request->date_end])->get();
            return view('report.topup_report', compact('topup', 'authposition', 'authname'));
        } elseif ($request->type == 'print') {
            $topup = HistoryTopup::whereBetween(DB::raw('DATE(topup_date)'), [$request->date_start, $request->date_end])->get();
            $html_report = view('report.print', compact('topup', 'authposition', 'authname'));

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html_report);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream("laporan.pdf", array("Attachment" => false));
        } else {
            $topup = HistoryTopup::get();
            return view('report.topup_report', compact('topup', 'authposition', 'authname'));
        }
    }

    public function transactionindex(Request $request)
    {
        $html_report = "";

        $transaction = Transaction::all();
        $authposition = session()->get('id_position');
        $authname = session()->get('name');

        if ($request->type == 'search') {
            $transaction = Transaction::whereBetween(DB::raw('DATE(transactions.transaction_date)'), [$request->date_start, $request->date_end])->get();
            return view('report.transaction_report', compact('transaction', 'authposition', 'authname'));
        } elseif ($request->type == 'print') {
            // $transaction = DB::table('transactions')->leftJoin('wahana', 'wahana.wahana_id', '=', 'transactions.wahana_id')->select('transactions.wahana_id', 'wahana.wahana_name', DB::raw('SUM(transactions.qty) as qty'), DB::raw('SUM(transactions.total) as total'))->whereBetween(DB::raw('DATE(transactions.transaction_date)'), [$request->date_start, $request->date_end])->groupBy('transactions.wahana_id')->get();

            // Query Baru
            $wahana = DB::table('wahana')->get();
            $data = array();
            foreach ($wahana as $i => $a) {
                $trans = DB::table('transactions')
                    ->where('wahana_id', $a->wahana_id)
                    ->selectRaw("COUNT(qty) as totqty")
                    ->selectRaw("SUM(total) as totpembayaran")
                    ->whereBetween('transaction_date', [$request->date_start, $request->date_end])
                    ->groupBy('wahana_id')
                    ->first();
                if ($trans != '') {
                    $total = $trans->totqty;
                    $totpay = $trans->totpembayaran;
                } else {
                    $total = 0;
                    $totpay = 0;
                }
                $data[] = array(
                    'wahana_name' => $a->wahana_name,
                    'total' => $total,
                    'total_pay' => $totpay

                );
            }

            // dd($data);

            $html_report = view('report.transaction_print', compact('transaction', 'authposition', 'authname', 'data'))->render();
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html_report);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream("laporan.pdf", array("Attachment" => false));
        } else {
            $transaction = Transaction::get();
            return view('report.transaction_report', compact('transaction', 'authposition', 'authname'));
        }
    }

    public function indexwahana(Request $request)
    {
        if ($request->type == 'search') {
            $wahana = DB::table('wahana')->get();
            $data = array();
            $operator = array();
            foreach ($wahana as $key => $a) {
                $opr = DB::table('schedule')
                    ->where('wahana_id', $a->wahana_id)
                    ->get();
                foreach ($opr as $key => $b) {
                    $emp = DB::table('employees')->where('employee_nik', $b->staff_loket_nik)->get();
                    $operator[] = array(
                        'employee_nik' => $b->staff_loket_nik,
                        'date' => $b->date
                    );
                }

                if (!empty($b->date)) {
                    $hari = $b->date;
                } else {
                    $hari = '';
                }

                $data[] = array(
                    'wahana_name' => $a->wahana_name,
                    'wahana_id' => $a->wahana_id,
                    'date' => $hari
                );
            }

            return view('report.wahana_report', compact('data'));
        } elseif ($request->type == 'print') {
            $wahana = DB::table('wahana')->get();
            $data = array();
            $operator = array();
            foreach ($wahana as $key => $a) {
                $opr = DB::table('schedule')
                    ->where('wahana_id', $a->wahana_id)
                    ->whereBetween('date', [$request->date_start, $request->date_end])
                    ->get();
                // dd($opr);
                foreach ($opr as $key => $b) {
                    $emp = DB::table('employees')->where('employee_nik', $b->staff_loket_nik)->get();
                    // dd($emp);
                    $operator[] = array(
                        'employee_nik' => $b->staff_loket_nik,
                        'date' => $b->date
                    );
                }
                if (!empty($b->date)) {
                    $hari = $b->date;
                } else {
                    $hari = '';
                }

                $data[] = array(
                    'wahana_name' => $a->wahana_name,
                    'wahana_id' => $a->wahana_id,
                    'date' => $hari
                );
            }
            return view('report.wahana_print', compact('data'));
        } else {
            $wahana = DB::table('wahana')->get();
            $data = array();
            $operator = array();
            foreach ($wahana as $key => $a) {
                $opr = DB::table('schedule')
                    ->where('wahana_id', $a->wahana_id)
                    ->whereBetween('date', [$request->date_start, $request->date_end])
                    ->get();
                // dd($opr);
                foreach ($opr as $key => $b) {
                    $emp = DB::table('employees')->where('employee_nik', $b->staff_loket_nik)->get();
                    // dd($emp);
                    $operator[] = array(
                        'employee_nik' => $b->staff_loket_nik,
                        'date' => $b->date
                    );
                }
                if (!empty($b->date)) {
                    $hari = $b->date;
                } else {
                    $hari = '';
                }

                $data[] = array(
                    'wahana_name' => $a->wahana_name,
                    'wahana_id' => $a->wahana_id,
                    'date' => $hari
                );
            }
            return view('report.wahana_report', compact('data'));
        }
    }
}
