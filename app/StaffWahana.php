<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffWahana extends Model
{
    Protected $table = "staff_wahana";

    protected $keyType= 'string';

	protected $fillable = [
        'employee_nik',
        'wahana_id',
        'date'
    ];

    public $timestamps = false;

    public static function deleteStaffWahana($employee_nik, $wahana_id, $date)
    {
        self::where("employee_nik", $employee_nik)->where("wahana_id", $wahana_id)->where("date", $date)->delete();
    }

    public function wahana()
    {
        return $this->hasOne(Wahana::class , 'wahana_id', 'wahana_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class , 'employee_nik', 'employee_nik');
    }
}
