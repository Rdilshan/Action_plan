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
        'totalKM',
        'unit_cost',
        'amount',
        'task_id'
    ];



}
