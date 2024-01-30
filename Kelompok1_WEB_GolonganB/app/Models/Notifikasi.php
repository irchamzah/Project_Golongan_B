<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    protected $table="notifikasis";

    protected $fillable = [
        'user_id', 
        'title', 
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function layanan_detail()
    {
        return $this->belongsTo('App\Models\LayananDetail', 'layanan_detail_id', 'id');
    }
}
