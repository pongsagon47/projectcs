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
        DB::table('role_productions')->insert([
            'name' => 'Thai dessert room',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_productions')->insert([
            'name' => 'Rolls room',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_productions')->insert([
            'name' => 'Cake room',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_productions')->insert([
            'name' => 'Cookie dessert room',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
