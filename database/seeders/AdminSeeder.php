<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::query()->truncate();

        Admin::query()->insert([
            [
                'name' => 'Вова Євсюк',
                'email' => 'vov2706@gmail.com',
                'login' => 'vova_yevsiuk',
                'password' => Hash::make('vov270602')
            ],
            [
                'name' => 'Юра Крулік',
                'email' => 'yurii.krulik@gmail.com',
                'login' => 'yura_krulik',
                'password' => Hash::make('11111111')
            ],
        ]);
    }
}
