<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinetUnit extends Model
{
    protected $fillable = ['name', 'tier', 'parent_unit_id', 'order_number'];

public function members()
{
    return $this->hasMany(CabinetMember::class)->orderBy('order_number');
}

public function parent()
{
    return $this->belongsTo(CabinetUnit::class, 'parent_unit_id');
}

public function children()
{
    return $this->hasMany(CabinetUnit::class, 'parent_unit_id')->orderBy('order_number');
}
}
