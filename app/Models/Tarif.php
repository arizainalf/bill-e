<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pelanggans(){
        return $this->hasMany(Pelanggan::class);
    }
}
