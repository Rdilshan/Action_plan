<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'subaction_id'];

    public function subaction()
    {
        return $this->belongsTo(Subaction::class);
    }
}
