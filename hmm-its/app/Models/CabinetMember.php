<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinetMember extends Model
{
    protected $fillable = [
        'cabinet_unit_id', 'name', 'position', 'photo', 'group_name', 'order_number'
    ];

public function unit()
{
    return $this->belongsTo(CabinetUnit::class, 'cabinet_unit_id');
}
}
