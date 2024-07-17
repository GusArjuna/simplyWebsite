<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriMakanan extends Model
{
    use HasFactory;
    protected $fillable=[
        'kode',
        'nama',
        'keterangan',
    ];
    public function makanans()
    {
        return $this->hasMany(Makanan::class);
    }
}
