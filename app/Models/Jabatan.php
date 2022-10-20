<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "jabatan";
    protected $fillable=['kode_jabatan','nama_jabatan'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
