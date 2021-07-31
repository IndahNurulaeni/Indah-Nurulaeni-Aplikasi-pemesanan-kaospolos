<?php

namespace App\Http\Controllers\Api;

Use App\Models\Kategoris;
Use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategoris::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data',
            'data'    => $kategoris
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
            'name' => 'required|unique:friends|max:255',
            'description' => 'required',
        ]);

        $kategoris = Kategoris::create([
            'name' => $request->name,
            'description' => $request->description
            
        ]);

        if($kategoris)
        {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil di tambahkan',
                'data'    => $kategoris
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal di tambahkan',
                'data'    => $kategoris
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
        $kategori = Kategoris::where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data',
        'data'    => $kategori
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
        
        $kategori = Kategoris::find($id)
        ->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Data Kategori Berhasil Diubah',
            'data' => $kategori
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
        $kategori = Kategoris::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Di Hapus',
            'data'    => $kategori
        ], 200);
    
    }
}
