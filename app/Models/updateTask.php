<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class updateTask extends Model
{
    use HasFactory;
    protected $fillable = ['task_id','year','files','percentage','KPI'];

    public function Task()
    {
        return $this->belongsTo(Task::class);
    }
}
