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
        $products_all = Product::all();
        $products = Product::with('colors', 'sizes')->paginate(1);
        return view('frontend.products.index', compact('products', 'products_all'));
    }

    public function filterColor(Request $request, $filtercolor, $filtersize)
    {
        $products_all = Product::all();

        $products = Product::with('colors', 'sizes')->get();

        //dd($filtercolor, $filtersize);
        $filtercolor = explode(',', $filtercolor);
        $filtersize = explode(',', $filtersize);

        return view('frontend.products.filter', compact('products', 'products_all', 'filtercolor', 'filtersize'));
    }

    public function show($id, $productcolor, $productsize)
    {
        $product = Product::find($id);
        return view('frontend.products.show', compact('product', 'productcolor', 'productsize'));
    }
}
