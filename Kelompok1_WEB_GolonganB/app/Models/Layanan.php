<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table="layanans";

    protected $fillable=[
        'user_id',
        'status'
    ];

    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
    public function layanan_detail()
    {
        return $this->hasMany('App\Models\LayananDetail', 'layanan_id', 'id');
    }
}
