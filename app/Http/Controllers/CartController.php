<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tradenity\SDK\Entities\Category;
use Tradenity\SDK\Entities\ShoppingCart;

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
        $cart = ShoppingCart::add($productId, $quantity);
        return response()->json(['total' => $cart->total, 'count' => $cart->count]);
    }

    public function removeItem($id)
    {
        $cart = ShoppingCart::removeItem($id);
        return response()->json(['total' => $cart->total, 'count' => $cart->count]);
    }
}
