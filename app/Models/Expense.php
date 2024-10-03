<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'exonensesValue';

    protected $fillable = [
        'name',
        'Type',
        'no_unit',
        'unit_cost',
        'amount',
        'no_days',
        'totalKM',
        'task_id'
    ];



}
