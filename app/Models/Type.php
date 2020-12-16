<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'type_price'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
