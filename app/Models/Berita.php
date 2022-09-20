<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'idberita';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'judulberita','isi','tglposting','jamposting','seoberita','idkategoriberita','user_id'
    ];

    public function kategoriberita()
    {
        return $this->hasOne(KategoriBerita::class, 'idkategoriberita', 'idkategoriberita');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
