<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Type;
use App\Models\Surface;
use App\Models\Manufacturer;
use App\Models\Construct;
use App\Models\Style;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function products_index()
    {
        return Product::get();
    }

    public function product_item($id, Request $request)
    {
        return Product::with('colors', 'other_products.types', 'manufacturers', 'constructs', 'styles', 'surfaces', 'types')->find($id);
    }

}
