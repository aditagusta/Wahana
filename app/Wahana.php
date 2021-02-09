<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wahana extends Model
{
    Protected $table = "wahana";

    protected $primaryKey = 'wahana_id';

    protected $keyType= 'string';

	protected $fillable = [
        'wahana_id',
        'wahana_name',
        'price',
        'image',
        'open_time',
        'close_time',
        'status'
    ];

    public $timestamps = false;

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'wahana_id', 'wahana_id');
    }

     public function schedule()
    {
        return $this->hasMany(Schedule::class, 'wahana_id', 'wahana_id');
    }

     public function tools()
    {
        return $this->hasMany(Tools::class, 'wahana_id', 'wahana_id');
    }
}
