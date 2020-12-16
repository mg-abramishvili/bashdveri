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
        $products_colors = Product::with([
            'colors' => function($query){
                $query->groupBy('color');
            }
        ])
        ->get();

        $products_sizes = Product::with([
            'sizes' => function($query){
                $query->groupBy('size');
            }
        ])
        ->get();

        $products_styles = Product::all();
        $products_styles = $products_styles->unique(function ($item) {
            return $item['style'];
        });
        $products_styles->values()->all();

        $products_manufacturers = Product::all();
        $products_manufacturers = $products_manufacturers->unique(function ($item) {
            return $item['manufacturer'];
        });
        $products_manufacturers->values()->all();

        $products = Product::with('colors', 'sizes')->get();

        return view('frontend.products.index', compact('products', 'products_colors', 'products_sizes', 'products_manufacturers', 'products_styles'));
    }

    public function filterColor(Request $request, $filtercolor, $filtersize, $filterstyle, $filtermanufacturer)
    {
        $products_colors = Product::with([
            'colors' => function($query){
                $query->groupBy('color');
            }
        ])
        ->get();

        $products_sizes = Product::with([
            'sizes' => function($query){
                $query->groupBy('size');
            }
        ])
        ->get();

        $products_styles = Product::all();
        $products_styles = $products_styles->unique(function ($item) {
            return $item['style'];
        });
        $products_styles->values()->all();

        $products_manufacturers = Product::all();
        $products_manufacturers = $products_manufacturers->unique(function ($item) {
            return $item['manufacturer'];
        });
        $products_manufacturers->values()->all();

        $filtercolor = explode(',', $filtercolor);
        $filtersize = explode(',', $filtersize);
        $filterstyle = explode(',', $filterstyle);
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
            ->where('style', 'manufacturer')
            ->orWhere(function ($query) use ($filterstyle) {
                if ($filterstyle[0] !== '*') {
                    $query->where('style');
                    foreach ($filterstyle as $fstyle) {
                        $query->orWhere('style', $fstyle);
                    }
                }
            })
            ->orWhere(function ($query) use ($filtermanufacturer) {
                if ($filtermanufacturer[0] !== '*') {
                    $query->where('style');
                    foreach ($filtermanufacturer as $fmanufacturer) {
                        $query->orWhere('style', $fmanufacturer);
                    }
                }
            })
            ->get();
            
        return view('frontend.products.filter', compact('products', 'products_colors', 'products_sizes', 'products_manufacturers', 'products_styles', 'filtercolor', 'filtersize', 'filtermanufacturer', 'filterstyle'));
    }

    public function show($id, $productcolor, $productsize, $productstyle)
    {
        $product = Product::find($id);
        return view('frontend.products.show', compact('product', 'productcolor', 'productsize', 'productstyle'));
    }
}
