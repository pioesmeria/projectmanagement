<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $primaryKey = 'task_id';

    protected $fillable = [
        'task_description', 'status', 'account_id'
    ];
}
