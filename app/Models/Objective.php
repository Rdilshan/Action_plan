<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'goal_id'];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function strategy()
    {
        return $this->hasOne(Strategy::class);
    }
}
