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
        User::factory()->count(5)->create()->each(function (User $user){
            $user->assignRole('user');
        });
        User::factory()->count(5)->create()->each(function (User $user){
            $user->assignRole('merchant');
        });
    }
}
