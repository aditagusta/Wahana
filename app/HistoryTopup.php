<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryTopup extends Model
{
    public $timestamps = false;

    protected $table = "history_topup";

    protected $primaryKey = 'topup_id';

    protected $keyType= 'string';

	protected $fillable = [
        'topup_id', 'topup_date', 'amount', 'id_visitor','employee_nik',
    ];
   
    public function visitor()
    {
    	return $this->belongsTo(Visitor::class, 'id_visitor', 'visitor_id');
    }

    public function employee()
    {
    	return $this->belongsTo(Employee::class, 'employee_nik', 'employee_nik');
    }
}
