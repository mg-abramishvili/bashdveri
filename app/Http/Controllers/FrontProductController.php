<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function index()
    {
        //$products = Product::with('colors')->get();
        //$products = Color::with('products')->where('color', 'Красный1')->get();
        $products = Color::with('products')->get();
        return view('frontend.products.index', compact('products'));
    }

    public function filterColor(Request $request)
    {
        $products_all = Color::with('products')->get();
        $products = QueryBuilder::for(Color::with('products'))
                                ->allowedFilters([AllowedFilter::exact('color')])
                                ->get();
        $diff = $products_all->diff($products);
        $diff->all();
        return view('frontend.products.filter', compact('products','products_all', 'diff'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('frontend.products.show', compact('product'));
    }
}
