<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
protected $table = 'menu';
protected $primaryKey = 'id';
public $timestamps = false;

    public function categoria() 
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
