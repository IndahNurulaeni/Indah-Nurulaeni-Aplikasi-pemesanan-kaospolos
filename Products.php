<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['Nama_Produk','Harga_Produk','Bahan', 'kategoris_id'];

    public function kategoris()
    {
        return $this->belongsTo('App\Models\Kategoris');
    }
}
