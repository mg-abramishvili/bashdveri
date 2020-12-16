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

        $products_all = Product::with(['colors' => function($query){
            $query->select('id')->groupBy('color');
        }])->get();

        $products = Product::with('colors', 'sizes')->get();

        return view('frontend.products.index', compact('products', 'products_all'));
    }

    public function filterColor(Request $request, $filtercolor, $filtersize, $filtermanufacturer)
    {
        $products_all = Product::with(['colors' => function($query){
            $query->select('color_id', 'color')->groupBy('color');
        }])->get();

        $filtercolor = explode(',', $filtercolor);
        $filtersize = explode(',', $filtersize);
        $filtermanufacturer = explode(',', $filtermanufacturer);

        $products = Product::with(
            [
                'colors' => function ($query) use ($filtercolor) {
                    if ($filtercolor[0] !== '*') {
                        $query->where('color');
                        foreach ($filtercolor as $fcolor) {
                            $query->orWhere('color', $fcolor);
                        }
                    }
                },
                'sizes' => function ($query) use ($filtersize) {
                    if ($filtersize[0] !== '*') {
                        $query->where('size');
                        foreach ($filtersize as $fsize) {
                            $query->orWhere('size', $fsize);
                        }
                    }
                }
            ])
            ->where(function ($query) use ($filtermanufacturer) {
                if ($filtermanufacturer[0] !== '*') {
                    $query->where('manufacturer');
                    foreach ($filtermanufacturer as $fmanufacturer) {
                        $query->orWhere('manufacturer', $fmanufacturer);
                    }
                }
            })
            ->get();

        return view('frontend.products.filter', compact('products', 'products_all', 'filtercolor', 'filtersize', 'filtermanufacturer'));
    }

    public function show($id, $productcolor, $productsize)
    {
        $product = Product::find($id);
        return view('frontend.products.show', compact('product', 'productcolor', 'productsize'));
    }
}
