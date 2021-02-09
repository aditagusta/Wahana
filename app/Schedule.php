<?php

namespace App;

use App\Traits\CompositeKey;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use Traits\CompositeKey;
    // use CompositeKey;

    public $table = 'schedule';

    protected $primaryKey = ["date", "wahana_id"];

    public $fillable = [
        'date',
        'wahana_id',
        'staff_loket_nik'
    ];

    public function wahana()
    {
        return $this->belongsTo(Wahana::class, 'wahana_id', 'wahana_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'staff_loket_nik', 'employee_nik');
    }
}
