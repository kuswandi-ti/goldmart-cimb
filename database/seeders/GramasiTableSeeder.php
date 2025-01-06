<?php

namespace Database\Seeders;

use App\Models\Gramasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GramasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $input = [
            ['kode' => '0,5','created_by' => $user],
            ['kode' => '1','created_by' => $user],
            ['kode' => '2','created_by' => $user],
            ['kode' => '3','created_by' => $user],
            ['kode' => '5','created_by' => $user],
            ['kode' => '10','created_by' => $user],
            ['kode' => '25','created_by' => $user],
            ['kode' => '50','created_by' => $user],
            ['kode' => '100','created_by' => $user],
        ];
        foreach ($input as $item) {
            Gramasi::create($item);
        }
    }
}
