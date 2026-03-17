<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'section_id',
        'field_key',
        'field_type',
        'field_value'
    ];
}
