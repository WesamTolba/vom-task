<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::insert(
            [
                [
                    'name' => 'Merchant',
                    'guard_name' => 'web'
                ],
                [
                    'name' => 'user',
                    'guard_name' => 'web'
                ]]
        );
        $this->call(UserSeeder::class);
        $this->call(StoreSeeder::class);
//        $this->call(ProductSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
