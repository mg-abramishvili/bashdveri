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

        $products_types = Product::with([
            'types' => function($query){
                $query->groupBy('type');
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

        return view('frontend.products.index', compact('products', 'products_colors', 'products_sizes', 'products_manufacturers', 'products_styles', 'products_types'));
    }

    public function filterColor(Request $request, $filtercolor, $filtersize, $filterstyle, $filtertype, $filtermanufacturer)
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

        $products_types = Product::with([
            'types' => function($query){
                $query->groupBy('type');
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
        $filtertype = explode(',', $filtertype);
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
                },
                'types' => function ($query) use ($filtertype) {
                    if ($filtertype[0] !== '*') {
                        $query->where('type');
                        foreach ($filtertype as $ftype) {
                            $query->orWhere('type', $ftype);
                        }
                    }
                }
            ])
            ->where(function ($query) use ($filterstyle) {
                if ($filterstyle[0] !== '*') {
                    $query->where('style');
                    foreach ($filterstyle as $fstyle) {
                        $query->orWhere('style', $fstyle);
                    }
                }
            })
            ->where(function ($query) use ($filtermanufacturer) {
                if ($filtermanufacturer[0] !== '*') {
                    $query->where('manufacturer');
                    foreach ($filtermanufacturer as $fmanufacturer) {
                        $query->orWhere('manufacturer', $fmanufacturer);
                    }
                }
            })
            ->get();

        return view('frontend.products.filter', compact('products', 'products_colors', 'products_sizes', 'products_styles', 'products_types', 'products_manufacturers', 'filtercolor', 'filtersize', 'filterstyle', 'filtertype', 'filtermanufacturer'));
    }

    public function show($id, $productcolor, $productsize, $producttype)
    {
        $product = Product::find($id);
        return view('frontend.products.show', compact('product', 'productcolor', 'productsize', 'producttype'));
    }
}
