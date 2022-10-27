<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;
use DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            'id'=>'1',
            'kode_jabatan'=>'JBT-0001',
            'nama_jabatan'=>'Administrator',
        ]);
        DB::table('jabatan')->insert([
            'id'=>'2',
            'kode_jabatan'=>'JBT-0002',
            'nama_jabatan'=>'penanggung jawab ruangan',
        ]);
        DB::table('jabatan')->insert([
            'id'=>'3',
            'kode_jabatan'=>'JBT-0003',
            'nama_jabatan'=>'penanggung jawab barang',
        ]);
        DB::table('jabatan')->insert([
            'id'=>'4',
            'kode_jabatan'=>'JBT-0004',
            'nama_jabatan'=>'peminjam',
        ]);

    }
}
