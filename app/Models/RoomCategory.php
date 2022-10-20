<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;
    protected $table = "room_categories";
    protected $guarded=['id'];
    protected $fillable=['kode_kategruangan','nama_kategruangan'];

    public function ruangan()
    {
        return $this->hasMany(Room::class);
    }

    
}
