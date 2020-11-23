<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $guarded=['nama'];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }
}
