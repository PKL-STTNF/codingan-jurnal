<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal',
        'hari',
        'unit_kerja',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}