<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
protected $table = 'menu';

    public function categoria() 
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
