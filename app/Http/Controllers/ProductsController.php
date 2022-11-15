<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Factory;
class ProductsController extends Controller
{
    //

    public function index() {
        if (\Auth::user()->role == '1')
            return redirect()->intended('/deliveries');

        $Products = Product::all();
        return view('products.index', [
            "Products" => $Products
        ]);
    }
    public function addProductPage() {
        if (\Auth::user()->role == '1')
            return redirect()->intended('/deliveries');

        $Factories = Factory::all();
        return view('products.add', [
            "Factories" => $Factories
        ]);

    }

    public function addAction(Request $request) {

        $request->validate( [
            'name' => 'required|min:2',
            'price' => 'required|min:0',
            'factory'   => 'required'

        ]);

        $Product = new Product();
        $Product->name = $request->name;
        $Product->price = $request->price;
        $Product->factory = $request->factory;

        if ($Product->save())
            return redirect()->intended('/products');

        return redirect()->back()->with('fail', 'Opération Echouée!');

    }
}
