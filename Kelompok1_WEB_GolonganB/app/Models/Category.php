<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";

    //relasi ke tabel layananuser
    // public function layanan(){
    //     return $this->hasMany(layanan::class);
    // }

    public function layanan_detail()
    {
        return $this->hasMany('App\Models\LayananDetail', 'category_id', 'id');
    }
}
