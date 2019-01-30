<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $primaryKey = 'account_id';
    protected $fillable = [
        'username', 'password'
    ];
}
