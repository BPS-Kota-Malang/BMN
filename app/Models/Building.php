<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $table = "buildings";
    protected $guarded=['id'];
    protected $fillable=['kode_gudang','nama_gedung', 'alamat'];

    public function ruangan()
    {
        return $this->hasMany(Room::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(BorrowRoom::class);
    }

    public function gudang()
    {
        return $this->hasMany(Product::class);
    }
}
