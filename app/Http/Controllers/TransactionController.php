<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'transactions' => Transaction::orderBy('status', 'desc')->orderBy('order_date', 'desc')->get(),
            'total_price_cart' => DB::table('carts')->sum('total_price'),
            'carts' => Cart::orderBy('created_at', 'desc')->get(),
            'category_name' => Product::all(),
            'products' => Product::where('status', '!=', 'Habis')->get(),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
            'cart_products' => DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->select('products.*', 'carts.*')->orderBy('.carts.product_id', 'desc')->get(),
        ];

        return view('pages.customer.tranksaksi.transaction-manage', $data);
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
    public function store()
    {
        // validasi field satu persatu sebelum melakukan insert
        Transaction::create([
            'status' => 'Transaction Proccess',
        ]);

        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'total_price_cart' => DB::table('carts')->sum('total_price'),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
            'cart_products' => DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->select('products.*', 'carts.*')->orderBy('.carts.product_id', 'desc')->get(),
        ];

        return view('pages.customer.tranksaksi.details-transaction', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'transaction'  => Transaction::find($id),
            'action' => route('customer.transaction.update', $id),
            'total_price_cart' => DB::table('carts')->sum('total_price'),
            'category_nav' => Category::select('name')->where('status', 'Aktif')->orderBy('name', 'asc')->get(),
            'cart_products' => DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->select('products.*', 'carts.*')->orderBy('.carts.product_id', 'desc')->get(),
        ];

        return view('pages.customer.tranksaksi.proccess-transaction', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $newStatus['status'] = 'Success Order'; // status baru yang ingin diassign

        // Atau update status menggunakan Eloquent ORM
        $transaction = Transaction::find($id);

        // proses update status
        $transaction->status = $newStatus['status'];
        $transaction->save();

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaction::findOrFail($id);
        $data->delete();

        return redirect()->route('transaction.index');
    }
}
