<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comander extends Model
{
    protected $table = 'comander';

    const CREATE_AT = 'create_at';
    const UPDATE_AT = 'date_mod';


    public function detall(): HasMany
    {
        return $this->hasMany(comanderDetall::class, 'comander_id', 'id');
    }


}
