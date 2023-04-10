<?php

namespace App\Http\Controllers;

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
            'categories' => Product::with('category')->select('category_id')->groupBy('category_id')->get(),
            'products' => Product::all(),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
        ];

        return view('pages.customer.beranda', $data);
    }

    public function cartPage()
    {
        $data = [
            'products' => Product::all(),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
        ];

        return view('pages.customer.cart', $data);
    }
}
