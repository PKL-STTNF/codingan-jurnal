<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'sekolah',
        'tempat_pkl',
        'guru_pembimbing',
        'instruktur',
        'periode',
    ];
}