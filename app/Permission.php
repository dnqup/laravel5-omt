<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'display_name',
        'key_code',
    ];
}
