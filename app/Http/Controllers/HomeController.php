<?php

namespace App\Http\Controllers;
use App\Models\Homes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return 'test berhasil';
    }

    public function urutan($ke)
    {
        $products = Products::paginate(3);

        return view ('product', compact('products'));
    }

    public function home($ke)
    {
        return view ('home', ['ke' => $ke]);
    }

    public function products()
    {
        $products = Products::paginate(6);

        return view ('product', compact('products'));
    }
}
