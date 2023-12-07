<?php

namespace App\Models;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();

        // Event pada saat pembuatan transaksi
        static::creating(function ($transaksi) {
            $transaksi->no_pemesanan = 'INV-' . strtoupper(uniqid());
        });
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
