<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPesanan extends Model
{
    use HasFactory;
    protected $table="status_pesanans";

    public function layanan_detail()
    {
        return $this->hasMany('App\Models\LayananDetail', 'status_id', 'id');
    }
}
