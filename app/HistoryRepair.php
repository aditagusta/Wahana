<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryRepair extends Model
{
    Protected $table = "history_of_repair";

    protected $primaryKey = 'repair_id';

    protected $keyType= 'string';

	protected $fillable = [
        'repair_id',
        'id_tool',
        'date_start',
        'date_end',
        'ket'
    ];

    public $timestamps = false;

   public function tools()
    {
        return $this->hasOne(Tools::class , 'tool_id', 'id_tool');
    }
}
