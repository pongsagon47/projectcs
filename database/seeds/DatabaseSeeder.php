<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('role_employees')->insert([
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'Order',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_employees')->insert([
            'name' => 'Production',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'Sender',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_employees')->insert([
            'name' => 'Thai dessert room',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'Rolls room',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_employees')->insert([
            'name' => 'Cake room',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'Cookie dessert room',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Branch shop',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Franchise store',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Shop to sell',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
