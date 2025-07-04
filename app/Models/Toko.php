<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_toko',
        'alamat',
        'no_telepon',
        'deskripsi',
        'logo',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}

