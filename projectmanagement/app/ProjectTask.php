<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $table = 'projecttasks';
    public $primaryKey = 'projectTask_id';

    protected $fillable = [
        'projectTask_id', 'task_id', 'project_id'
    ];
}
