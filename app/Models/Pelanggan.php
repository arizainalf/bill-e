<?php
namespace App\Models;

use App\Models\Tarif;
use App\Models\Tagihan;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $guarded = [];

    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }

    public function tagihans()
    {
        return $this->hasMany(Tagihan::class);
    }
}
