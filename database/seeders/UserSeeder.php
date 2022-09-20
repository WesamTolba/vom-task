<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                'name' => 'merchant',
                'email' => 'merchant@getvom.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'user',
                'email' => 'user@getvom.com',
                'password' =>  bcrypt('123456')
            ]
        );
        User::factory()->count(5)->create();
    }
}
