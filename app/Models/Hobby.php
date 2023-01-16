<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;

    protected $table = "hobbies"; // menghubungkan ke dalam tabel hobbies

    protected $guarded = [];

    public function hobiable()
    {
        return $this->morphTo(__FUNCTION__,'hobiable_type','hobiable_id');
    }
}
