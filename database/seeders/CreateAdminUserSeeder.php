<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Fajar',
            'email'=>'fajar@gmail.com',
            'password'=>bcrypt('12345678'),
            'kontak'=>'082247477770',
            'alamat'=>'malang',
            'role'=>'admin',
            'id_jabatan'=>'1',

        ]);
        DB::table('users')->insert([
            'name'=>'wahyu',
            'email'=>'pjruang@gmail.com',
            'password'=>bcrypt('12345678'),
            'kontak'=>'082247477770',
            'alamat'=>'malang',
            'role'=>'pjruangan',
            'id_jabatan'=>'2',

        ]);
        DB::table('users')->insert([
            'name'=>'barang',
            'email'=>'pjbarang@gmail.com',
            'password'=>bcrypt('12345678'),
            'kontak'=>'082247477770',
            'alamat'=>'malang',
            'role'=>'pjbarang',
            'id_jabatan'=>'3',

        ]);
        DB::table('users')->insert([
            'name'=>'peminjam',
            'email'=>'peminjam@gmail.com',
            'password'=>bcrypt('12345678'),
            'kontak'=>'082247477770',
            'alamat'=>'malang',
            'role'=>'peminjam',
            'id_jabatan'=>'4',

        ]);
    }
}
