<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    use HasFactory;

    protected $table = "pelajars"; // menghubungkan ke dalam tabel pelajars

    protected $guarded = [];

    protected $fillable = [
        'nama',
        'jk',
        'jurusan_id',
    ];

    public function hobis()
    {
        return $this->morphMany(Hobby::class, 'hobiable');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
