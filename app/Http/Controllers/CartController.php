<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'carts' => Cart::orderBy('created_at', 'desc')->get(),
            'category_name' => Product::all(),
            'products' => Product::where('status', '!=', 'Habis')->get(),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
            'cart_products' => DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->select('products.*', 'carts.*')->orderBy('.carts.product_id', 'desc')->get(),
        ];

        return view('pages.customer.cart', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //  mengambil data product
        $product = Product::find($id);

        // validasi field satu persatu sebelum melakukan insert
        Cart::create([
            'product_id' => $product->id,
            'quantity' => 1,
            'total_price' => $product->price,
        ]);

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // mengambil data price product
        $cart = Cart::find($id);
        $searchProduct = $cart->product_id;
        $price = Product::where('id', $searchProduct)->value('price');

        // mengambil data field quantity
        $quantity = $request->input('quantity');
        $fix_quantity = intval($quantity);

        // proses update
        Cart::where('id', $id)->update([
            'quantity' => $quantity,
            'total_price' => $price * $fix_quantity,
        ]);

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Cart::findOrFail($id);
        $data->delete();

        return redirect()->route('cart.index');
    }
}
