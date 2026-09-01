<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dokumentasi;

class Journal extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal',
        'hari',
        'unit_kerja',
        'catatan',
        'dokumentasi',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Dokumentasi
     */
    public function dokumentasis()
    {
        return $this->hasMany(Dokumentasi::class, 'journal_id');
    }
}