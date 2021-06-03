<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'base_price',
        'description',
    ];

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size');
    }

    public function types()
    {
        return $this->belongsToMany('App\Models\Type');
    }

    public function styles()
    {
        return $this->belongsToMany('App\Models\Style');
    }

    public function constructs()
    {
        return $this->belongsToMany('App\Models\Construct');
    }

    public function surfaces()
    {
        return $this->belongsToMany('App\Models\Surface');
    }

    public function manufacturers()
    {
        return $this->belongsToMany('App\Models\Manufacturer');
    }

    public function other_products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_product', 'product_id', 'oproduct_id');
    }
}
