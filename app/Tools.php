<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    Protected $table = "tools_wahana";

    protected $primaryKey = 'tool_id';

    protected $keyType= 'string';

	protected $fillable = [
        'tool_id',
        'wahana_id',
        'tool_name',
        'good',
        'broken',
        'repaired'
    ];

    public $timestamps = false;

   public function wahana()
    {
        return $this->belongsTo(Wahana::class , 'wahana_id', 'wahana_id');
    }

      public function history_repair()
    {
        return $this->hasMany(HistoryRepair::class, 'tool_id', 'tool_id');
    }
}
