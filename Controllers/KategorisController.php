<?php

namespace App\Http\Controllers;

Use App\Models\Kategoris;
Use App\Models\Friends;
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
        $kategoris = Kategoris::orderBy('id','desc')->paginate(3);
    
    return view ('kategoris.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kategoris.create');
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
            'name' => 'required|unique:kategoris|max:255',
            'description' => 'required',
        ]);
   
           $kategoris = new kategoris;
   
           $kategoris->name = $request->name;
           $kategoris->description = $request->description;
   
           $kategoris->save();
   
           return redirect('/kategoris');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategoris::where('id',$id)->first();
      return view('kategoris.show', ['kategori' => $kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategoris::where('id',$id)->first();
      return view('kategoris.edit', ['kategori' => $kategori]);
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
        Kategoris::find($id)->update([
            'name' => $request->name,
            'description' => $request->description
         ]);
   
         return redirect ('/kategoris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategoris::find($id)->delete();
        return redirect ('/kategoris');
    }

    public function addmember($id)
    {
        $product = Products::where('kategoris_id', '=', 0)->get();
        $kategori = Kategoris::where('id',$id)->first();
      return view('kategoris.addmember', ['kategori' => $kategori, 'product' => $product]);
    }

    public function updateaddmember(Request $request, $id)
    {
        $product = Products::where('id',$request->product_id)->first();
        Products::find($product->id)->update([
            'kategoris_id' => $id
         ]);
   
         return redirect ('/kategoris/addmember/'. $id); 
    }

    public function deleteaddmember(Request $request, $id)
    {
      // dd($id);
      Products::find($id)->update([
            'kategoris_id' => 0
         ]);
   
         return redirect ('/kategoris'); 
    }

}
