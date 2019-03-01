<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tradenity\SDK\Resources\Category;
use Tradenity\SDK\Resources\ShoppingCart;
use Tradenity\SDK\Resources\LineItem;
use Tradenity\SDK\Resources\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('cart/index', array(
            'cart' => ShoppingCart::get(),
            'categories' => Category::findAll()
        ));
    }

    public function addItem(Request $request)
    {
        $productId = $request->input('product');
        $quantity = (int)$request->input('quantity');
        $product = new Product(['id' => $productId]);
        $cart = ShoppingCart::addItem(new LineItem(['product' => $product, 'quantity' => $quantity]));
        return response()->json(['total' => $cart->getTotal(), 'count' => count($cart->getItems())]);
    }

    public function removeItem($id)
    {
        $cart = ShoppingCart::deleteItem($id);
        return response()->json(['total' => $cart->getTotal(), 'count' => count($cart->getItems())]);
    }
}
