<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tradenity\SDK\Entities\Brand as Brand;
use Tradenity\SDK\Entities\Category as Category;
use Tradenity\SDK\Entities\Collection as Collection;
use Tradenity\SDK\Entities\Product;
use Tradenity\SDK\Entities\ShoppingCart;

class ShopController extends Controller
{
    //

    public function index(Request $request){
        return view('shop/index', array(
            'cart' => ShoppingCart::get(),
            'categories' => Category::findAll(),
            'collections' => Collection::findAll(),
        ));
    }


    public function products(Request $request){
        if($request->has('query')){
            $products = Product::findAll(['title' => $request->query('query')]);
        }else{
            $products = Product::findAll();
        }
        return view('shop/products', array(
            'cart' => ShoppingCart::get(),
            'products' => $products,
            'brands' => Brand::findAll(),
            'categories' => Category::findAll(),
            'featured' => Collection::findOne(['name' => 'featured']),
        ));
    }


    public function categories($id){
        return view('shop/products', array(
            'cart' => ShoppingCart::get(),
            'products' => Product::findAll(['category' => $id]),
            'brands' => Brand::findAll(),
            'categories' => Category::findAll(),
            'featured' => Collection::findOne(['name' => 'featured']),
        ));
    }


    public function brands($id){
        return view('shop/products', array(
            'cart' => ShoppingCart::get(),
            'products' => Product::findAll(['brand' => $id]),
            'brands' => Brand::findAll(),
            'categories' => Category::findAll(),
            'featured' => Collection::findOne(['name' => 'featured']),
        ));
    }

    public function product_details($id){
        return view('shop/single', array(
            'cart' => ShoppingCart::get(),
            'product' => Product::findById($id),
            'brands' => Brand::findAll(),
            'categories' => Category::findAll(),
            'featured' => Collection::findOne(['name' => 'featured']),
        ));
    }
    
}
