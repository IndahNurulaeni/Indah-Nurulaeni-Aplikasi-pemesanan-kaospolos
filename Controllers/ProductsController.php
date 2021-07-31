<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('id')->paginate(3);

        return view('products.index',compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'Nama_Produk' => 'required|unique:posts|max:255',
            'Harga_Produk' => 'required|numeric',
            'Bahan' => 'required',
        ]);

        $products = new Products;

        $products->Nama_Produk = $request->Nama_Produk;
        $products->Harga_Produk = $request->Harga_Produk;
        $products->Bahan = $request->Bahan;

        $products->save();

        return redirect('/');
    }
    public function show ($id)
    {
        $product=Products::where('id', $id)->first();
        return view('products.show',['product'=> $product]);
    }
    public function edit ($id)
    {
        $product=Products::where('id', $id)->first();
        return view('products.edit',['product'=> $product]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_Produk' => 'required|unique:posts|max:255',
            'Harga_Produk' => 'required|numeric',
            'Bahan' => 'required',
        ]);
        Products::find($id)->update([
            'Nama_Produk'=> $request->Nama,
            'Harga_Produk'=> $request->Harga,
            'Bahan'=> $request->Bahan,
        ]);
        return redirect('/');
    }
    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect('/');
    }
    public function welcome()
    {
        return view ('products.welcome');
    }
}

