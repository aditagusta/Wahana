<?php

namespace App;
use App\Traits\CompositeKey;

use Illuminate\Database\Eloquent\Model;

class StaffOperator extends Model
{
    use Traits\CompositeKey;
     // use CompositeKey;

    public $table = 'staff_operators';

    protected $primaryKey = ["date","wahana_id","staff_operator_nik"];

    public $fillable = [
        'date',
        'wahana_id',
        'staff_operator_nik'];
    
     public function employee()
    {
        return $this->belongsTo(Employee::class, 'staff_operator_nik', 'employee_nik');
    }
}
