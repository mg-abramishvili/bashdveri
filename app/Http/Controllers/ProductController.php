<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.products.edit', compact('product'));
    }

    public function file($type)
    {

        switch ($type) {
            case 'upload':
                return $this->upload();


        }

        return \Response::make('success', 200, [
            'Content-Disposition' => 'inline',
        ]);
    }

    public function upload()
    {

        if (request()->file('color_image')) {
            $file = request()->file('color_image');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);
        }

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/backend/products');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'base_price' => 'required',
            'type' => 'required',
            'construct_type' => 'required',
            'manufacturer' => 'required',
            'surface' => 'required',
            'style' => 'required',
        ]);

        $data = request()->all();
        $products = new Product();
        $products->title = $data['title'];
        $products->base_price = $data['base_price'];

        if (!empty($data['description'])) {
            $products->description = $data['description'];
        }

        $products->type = $data['type'];
        $products->construct_type = $data['construct_type'];
        $products->manufacturer = $data['manufacturer'];
        $products->surface = $data['surface'];
        $products->style = $data['style'];
        $products->save();
        return redirect('/backend/products');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'base_price' => 'required',
            'type' => 'required',
            'construct_type' => 'required',
            'manufacturer' => 'required',
            'surface' => 'required',
            'style' => 'required',
        ]);

        $data = request()->all();
        $products = Product::find($data['id']);
        $products->title = $data['title'];
        $products->base_price = $data['base_price'];

        if (!empty($data['description'])) {
            $products->description = $data['description'];
        }

        $products->type = $data['type'];
        $products->construct_type = $data['construct_type'];
        $products->manufacturer = $data['manufacturer'];
        $products->surface = $data['surface'];
        $products->style = $data['style'];
        $products->save();
        return redirect('/backend/products');
    }

    public function addColor(Request $request) {
        $data = request()->all();
        $products = Product::find($data['id']);
        $color = new Color([
            'color' => $data['color'],
            'color_price' => $data['color_price'],
            'color_image' => $data['color_image']
        ]);

        $products->colors()->save($color);
        return back();
    }

    public function updateColor(Request $request) {
        $data = request()->all();
        $color = Color::find($data['id']);
        $color->color = $data['color'];
        $color->color_price = $data['color_price'];
        $color->color_image = $data['color_image'];
        $color->save();
        return back();
    }

    public function addSize(Request $request) {
        $data = request()->all();
        $products = Product::find($data['id']);
        $size = new Size([
            'size' => $data['size'],
            'size_price' => $data['size_price']
        ]);

        $products->sizes()->save($size);
        return back();
    }

    public function updateSize(Request $request) {
        $data = request()->all();
        $size = Size::find($data['id']);
        $size->size = $data['size'];
        $size->size_price = $data['size_price'];
        $size->save();
        return back();
    }

    public function addType(Request $request) {
        $data = request()->all();
        $products = Product::find($data['id']);
        $type = new Type([
            'type' => $data['type'],
            'type_price' => $data['type_price']
        ]);

        $products->types()->save($type);
        return back();
    }

    public function updateType(Request $request) {
        $data = request()->all();
        $type = Type::find($data['id']);
        $type->type = $data['type'];
        $type->type_price = $data['type_price'];
        $type->save();
        return back();
    }
}
