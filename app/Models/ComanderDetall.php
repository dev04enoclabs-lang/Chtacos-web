<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Foundation\Console\ReloadCommand;

class ComanderDetall extends Model

{
    protected $table = 'comander_detall';


    public $timestamps = false; //Esta tabla no ocupa creaate_at y date_mod por defecto 

    public function comander(): BelongsTo
    {
        return $this->belongsTo(Comander::class, 'comander_id', 'id');
    }

    public function menu(): BelongsTo 
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id');
    }
}
