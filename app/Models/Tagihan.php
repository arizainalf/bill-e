<?php
namespace App\Models;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

}
