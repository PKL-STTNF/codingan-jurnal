<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasis';

    protected $fillable = [
        'journal_id',
        'file',
    ];

    public function journal()
    {
        return $this->belongsTo(Journal::class, 'journal_id');
    }
}