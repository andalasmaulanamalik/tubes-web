<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cabang extends Model
{
    protected $table = 'cabang_toko';
    protected $fillable =[
        'nama',
        'alamat',
        'user_id',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stok()
    {
        return $this->hasMany(Stok::class, 'cabang_id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'cabang_id');
    }
}
