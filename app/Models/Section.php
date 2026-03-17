<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['page_id','section_key','sort_order'];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
