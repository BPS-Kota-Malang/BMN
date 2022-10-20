<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowProduct extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "borrow_products";
    // protected $fillable= ['kode_peminjaman','nama_peminjam', 'petugas','jumlah', 'deskripsi', 'tanggal_pinjam', 'tanggal_kembali','tanggal_pengembalian','status', 'bukti_pengembalian','id_product',  'id_merk',  'id_user',];
    protected $fillable= ['kode_peminjaman','nama_peminjam', 'jumlah','petugas', 'deskripsi', 'tanggal_pinjam', 'tanggal_pengembalian','status', 'kondisi_setelahdipinjam','catatan','bukti_pengembalian','id_product', 'id_merk',  'id_user'];


    public function barang()
    {
        return $this->belongsTo(Product::class, 'id_product');

    }

    public function merk()
    {
        return $this->belongsTo(MerkProduct::class, 'id_merk');

    }




    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');

    }

    // public function admin()
    // {
    //     return $this->belongsTo(User::class, ' petugas');

    // }

    public function pengembalian()
    {
        return $this->hasOne(BuktiPengembalian::class);
    }


}
