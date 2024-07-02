<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'strategy_id'];

    public function strategy()
    {
        return $this->belongsTo(Strategy::class);
    }

    public function subaction()
    {
        return $this->hasOne(Subaction::class);
    }
}
