<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funding extends Model
{
    use HasFactory;


    protected $table = 'FundingValue';

    // Specify the fillable fields (Mass Assignment Protection)
    protected $fillable = [
        'name',
        'unit',
        'unit_charge',
        'amount',
        'task_id'
    ];

}
