<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoris extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    public function products()
    {
        return $this->hasMany('App\Models\Products');
    }
}
