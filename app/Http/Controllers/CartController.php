<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product) {

        //dd($product);

        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => 555,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index');
    }

    public function index() {
        $cart_items = \Cart::session(auth()->id())->getContent();
        return view('frontend.cart.index', compact('cart_items'));
    }

    public function delete($itemId) {
        \Cart::session(auth()->id())->remove($itemId);
        return redirect()->route('cart.index');
    }

    public function update($rowId) {
        \Cart::session(auth()->id())->update($rowId,[
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity'),
            ),
        ]);
        return redirect()->route('cart.index');
    }
}
