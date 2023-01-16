<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = "jurusans"; // menghubungkan ke dalam tabel jurusans

    protected $fillable = ['jurusan', 'kelas'];

    public function pelajar()
    {
        $this->hasMany(Pelajar::class);
    }
}
