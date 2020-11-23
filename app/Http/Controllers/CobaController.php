<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('id','desc')->paginate(3);

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
            'nama' => 'required|unique:posts|max:255',
            'bahan' => 'required',
            'harga' => 'required|numeric',
        ]);

        $products = new Products;

        $products->nama = $request->nama;
        $products->bahan = $request->bahan;
        $products->harga = $request->harga;

        $products->save();

        return redirect('/');
    }
    public function show ($Id)
    {
        $product=Products::where('Id', $Id)->first();
        return view('products.show',['product'=> $product]);
    }
    public function edit ($Id)
    {
        $product=Products::where('Id', $Id)->first();
        return view('products.edit',['product'=> $product]);
    }
    public function update(Request $request, $Id)
    {
        $request->validate([
            'nama' => 'required|unique:posts|max:255',
            'bahan' => 'required',
            'harga' => 'required|numeric',
        ]);
        Products::find($Id)->update([
            'nama'=> $request->Nama,
            'bahan'=> $request->Bahan,
            'harga'=> $request->Harga,
        ]);
        return redirect('/');
    }
    public function destroy($Id)
    {
        Products::find($Id)->delete();
        return redirect('/');
    }
    public function welcome()
    {
        return view ('products.welcome');
    }
}

