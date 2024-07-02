<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subaction extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'action_id'];

    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
