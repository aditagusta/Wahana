<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = "positions";

    protected $primaryKey = 'position_id';

    protected $keyType= 'string';

	protected $fillable = [
        'position_id',
        'position_name'
    ];

    public $timestamps = false;

   
   
    public function employee()
    {
    	return $this->hasMany(Employee::class, 'id_position','position_id');
    }
}
