<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     protected $table = 'datapenggunas';
    protected $fillable = [
        'user_id',
        'tanggal',
        'waktu',
        'lokasi',
        'suhu_tubuh',
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
