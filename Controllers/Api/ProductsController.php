<?php

namespace App\Http\Controllers\Api;

Use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::with('kategoris')->whereHas('kategoris')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data ',
            'data'    => $products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Produk' => 'required|unique:products|max:255',
            'Harga_produk' => 'required|numeric',
            'Bahan' => 'required',
        ]);

        $products = Products::create([
            'Nama_Produk' => $request->Nama_Produk,
            'Harga_Produk' => $request->Harga_Produk,
            'Bahan' => $request->Bahan,
            'kategoris_id' => $request->kategoris_id,
            
        ]);

        if($products)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil di tambahkan',
                'data'    => $products
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data gagal di tambahkan',
                'data'    => $products
            ], 409);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::with('kategoris')->where('id', $id)->get();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data ',
        'data'    => $product
    ], 200);
    }
    public function edit($id)
    {
        $product = Products::with('kategoris')->where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data',
        'data'    => $product
    ], 200);
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
        $product = Products::find($id)
        ->update([
            'Nama_Produk' => $request->Nama_Produk,
            'Harga_Produk' => $request->Harga_Produk,
            'Bahan' => $request->Bahan, 
            'kategoris_id' => $request->kategoris_id, 
        ]);
        return response()->json([
            'success' =>true,
            'message' =>'Data Berhasil Diubah',
            'data' => $product
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Di Hapus',
            'data'    => $product
        ], 200);
    }
}
