<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function approver1()
    {
        return $this->belongsTo('App\Models\User', 'approver1_id', 'id');
    }

    public function approver2()
    {
        return $this->belongsTo('App\Models\User', 'approver2_id', 'id');
    }
}
