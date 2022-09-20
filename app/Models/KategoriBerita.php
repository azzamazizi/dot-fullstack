<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'ms_kategoriberita';
    protected $primaryKey = 'idkategoriberita';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'namakategori'
    ];
}
