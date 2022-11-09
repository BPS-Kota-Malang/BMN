<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('kondisi_products')->insert([
            [
                'kode_kondisi'       => 'kd-001',
                'jenis_kondisi'      => 'Ringan',
                'id_statusproduct'   => 9
            ],
            [
                'kode_kondisi'       => 'kd-002',
                'jenis_kondisi'      => 'Sedang',
                'id_statusproduct'   => 9
            ],
            [
                'kode_kondisi'       => 'kd-003',
                'jenis_kondisi'      => 'Berat',
                'id_statusproduct'   => 9
            ],
            ]);

    }
}
