<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananDetail extends Model
{
    use HasFactory;
    protected $table="layanan_details";

    protected $fillable=[
        'layanan_id',
        'category_id',
        'user_id',
        'file',
        'tanggaljemput',
        'keterangan',
        'status_id',
        'pendapatan',
        'path'
    ];

    public function layanan()
    {
        return $this->belongsTo('App\Models\Layanan', 'layanan_id', 'id');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Models\Notifikasi', 'layanan_detail_id', 'id');
    }

    public function status_pesanan()
    {
        return $this->belongsTo('App\Models\StatusPesanan', 'status_id', 'id');
    }
}
