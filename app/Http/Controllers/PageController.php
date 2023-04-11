<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function buttonPage()
    {
        return view('template.button');
    }

    public function formPage()
    {
        return view('template.form');
    }

    public function chartPage()
    {
        return view('template.chart');
    }

    public function berandaPage()
    {
        $data = [
            'carts' => Cart::orderBy('created_at', 'desc')->get(),
            'categories' => Product::with('category')->select('category_id')->groupBy('category_id')->get(),
            'products' => Product::all(),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
        ];

        return view('pages.customer.beranda', $data);
    }

    public function transactionPage()
    {
        $data = [
            'total_price_cart' => DB::table('carts')->sum('total_price'),
            'carts' => Cart::orderBy('created_at', 'desc')->get(),
            'category_name' => Product::all(),
            'products' => Product::where('status', '!=', 'Habis')->get(),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
            'cart_products' => DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->select('products.*', 'carts.*')->orderBy('.carts.product_id', 'desc')->get(),
        ];

        return view('pages.customer.tranksaksi.transaction-manage', $data);
    }

    public function proccessPage()
    {
        $data = [
            'total_price_cart' => DB::table('carts')->sum('total_price'),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
            'cart_products' => DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->select('products.*', 'carts.*')->orderBy('.carts.product_id', 'desc')->get(),
        ];

        return view('pages.customer.tranksaksi.proccess-transaction', $data);
    }

    public function detailPage()
    {
        $data = [
            'total_price_cart' => DB::table('carts')->sum('total_price'),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
            'cart_products' => DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->select('products.*', 'carts.*')->orderBy('.carts.product_id', 'desc')->get(),
        ];

        return view('pages.customer.tranksaksi.details-transaction', $data);
    }
}
