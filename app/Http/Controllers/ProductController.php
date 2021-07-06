<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Type;
use App\Models\Surface;
use App\Models\Manufacturer;
use App\Models\Production;
use App\Models\Construct;
use App\Models\Style;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products_index()
    {
        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    public function products_create()
    {
        $types = Type::all();
        $styles = Style::all();
        $constructs = Construct::all();
        $surfaces = Surface::all();
        $manufacturers = Manufacturer::all();
        $productions = Production::all();
        return view('backend.products.create', compact('styles', 'types', 'constructs', 'surfaces', 'manufacturers', 'productions'));
    }

    public function product_edit($id)
    {
        $product = Product::with('styles', 'other_products')->find($id);
        $products = Product::where('title', 'LIKE', '%' . $product->title . '%')->get();
        $types = Type::all();
        $styles = Style::all();
        $constructs = Construct::all();
        $surfaces = Surface::all();
        $manufacturers = Manufacturer::all();
        $productions = Production::all();
        return view('backend.products.edit', compact('product', 'products', 'types', 'styles', 'constructs', 'surfaces', 'manufacturers', 'productions'));
    }

    public function products_delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/backend/products');
    }

    public function products_store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'base_price' => 'required',
            'constructs' => 'required',
            'manufacturers' => 'required',
            'surfaces' => 'required',
            'styles' => 'required',
        ]);

        $data = request()->all();
        $products = new Product();
        $products->title = $data['title'];
        $products->base_price = $data['base_price'];

        if (!empty($data['old_price'])) {
            $products->old_price = $data['old_price'];
        }
        if (!empty($data['description'])) {
            $products->description = $data['description'];
        }
        
        $products->save();
        $products->styles()->attach($request->styles, ['product_id' => $products->id]);
        $products->constructs()->attach($request->constructs, ['product_id' => $products->id]);
        $products->surfaces()->attach($request->surfaces, ['product_id' => $products->id]);
        $products->manufacturers()->attach($request->manufacturers, ['product_id' => $products->id]);
        $products->productions()->attach($request->productions, ['product_id' => $products->id]);
        $products->types()->attach($request->types, ['product_id' => $products->id]);
        return redirect('/backend/products');
    }

    public function product_update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'base_price' => 'required',
            'constructs' => 'required',
            'manufacturers' => 'required',
            'surfaces' => 'required',
            'styles' => 'required',
        ]);

        $data = request()->all();
        $products = Product::find($data['id']);
        $products->title = $data['title'];
        $products->base_price = $data['base_price'];
        
        if (!empty($data['old_price'])) {
            $products->old_price = $data['old_price'];
        }
        if (!empty($data['description'])) {
            $products->description = $data['description'];
        }
        
        $products->save();
        $products->styles()->detach();
        $products->styles()->attach($request->styles, ['product_id' => $products->id]);
        $products->constructs()->detach();
        $products->constructs()->attach($request->constructs, ['product_id' => $products->id]);
        $products->surfaces()->detach();
        $products->surfaces()->attach($request->surfaces, ['product_id' => $products->id]);
        $products->manufacturers()->detach();
        $products->manufacturers()->attach($request->manufacturers, ['product_id' => $products->id]);
        $products->productions()->detach();
        $products->productions()->attach($request->productions, ['product_id' => $products->id]);
        $products->types()->detach();
        $products->types()->attach($request->types, ['product_id' => $products->id]);
        $products->other_products()->detach();
        $products->other_products()->attach($request->other_products, ['product_id' => $products->id]);
        return redirect('/backend/products');
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

    public function addColor(Request $request) {
        $data = request()->all();
        $products = Product::find($data['id']);
        $color = new Color([
            'name' => $data['color_name'],
            'price' => $data['color_price'],
            'image' => $data['color_image']
        ]);
        $color->save();
        $products->colors()->attach($color->id, ['product_id' => $products->id]);
        return back();
    }

    public function updateColor(Request $request) {
        $data = request()->all();
        $color = Color::find($data['id']);
        $color->name = $data['color_name'];
        $color->price = $data['color_price'];
        $color->image = $data['color_image'];
        $color->save();
        return back();
    }

    public function deleteColor($color_id) {
        $color = Color::find($color_id);
        $color->delete();
        $color->products()->detach();
        return back();
    }

    public function addSize(Request $request) {
        $data = request()->all();
        $products = Product::find($data['id']);
        $size = new Size([
            'name' => $data['size_name'],
            'price' => $data['size_price'],
        ]);

        $products->sizes()->save($size);
        return back();
    }

    public function updateSize(Request $request) {
        $data = request()->all();
        $size = Size::find($data['id']);
        $size->name = $data['size_name'];
        $size->price = $data['size_price'];
        $size->save();
        return back();
    }

}
