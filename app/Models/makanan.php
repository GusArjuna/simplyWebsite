<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class makanan extends Model
{
    use HasFactory;
    protected $fillable=[
        'kode',
        'nama',
        'harga',
        'kategori_makanan_id',
        'keterangan',
    ];
    public function kategoriMakanan()
    {
        return $this->belongsTo(KategoriMakanan::class);
    }

}
