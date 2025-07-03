<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'toko_id',
        'nama_menu',
        'harga',
        'deskripsi',
        'category_id',
        'gambar',
    ];

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
