<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bank',
        'pemilik_bank',
        'nominal',
        'bukti_pembayaran',
        'status',
        'tanggal_pembayaran',
        'user_id',
        'bulan',
     
    ];

public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bulan()
    {
        return $this->belongsTo(Bulan::class);
    }
    

    
}
