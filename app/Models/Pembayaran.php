<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bank',
        'pemilik_bank',
        'nominal',
        'bukti_pembayaran',
        'status',
        'done_time',
        'siswa_id',
        'user_id',
        'bulan',
     
    ];

public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
