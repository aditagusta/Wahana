<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transaction extends Model
{
    public $timestamps = false;

    protected $table = "transactions";

    protected $primaryKey = 'transaction_id';

    protected $keyType = 'string';

    protected $fillable = [
        'transaction_id',
        'transaction_date',
        'qty',
        'total',
        'visitor_id',
        'wahana_id'
    ];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id', 'visitor_id');
    }

    public function wahana()
    {
        return $this->belongsTo(Wahana::class, 'wahana_id', 'wahana_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_nik', 'employee_nik');
    }

    public function reportTransactionsPerYear($year, $wahana)
    {
        return DB::select("SELECT monthname(times.date) AS bulan, IFNULL(transactions_year.total, 0) AS total from times LEFT JOIN
        (SELECT MONTHNAME(transaction_date) AS bulan, sum(total) AS total FROM transactions WHERE year(transaction_date) = '$year' AND wahana_id = '$wahana' group by MONTH(transaction_date) ORDER BY transaction_date ASC)
         transactions_year ON monthname(date) = transactions_year.bulan WHERE year(times.date) = '$year' GROUP BY month(times.date) ORDER BY times.date ASC");
    }

    public function reportTransactionsPerYearDonat($yeard)
    {
        return DB::select("select wahana.wahana_id, wahana.wahana_name , IFNULL(total,0) as total from wahana LEFT JOIN (SELECT wahana_id, (qty*count(wahana_id)) AS total FROM transactions WHERE year(transaction_date) = ? group by wahana_id ORDER BY transaction_date asc) wahana_year ON wahana.wahana_id = wahana_year.wahana_id order by wahana.wahana_name asc", [$yeard, $yeard]);
    }
}
