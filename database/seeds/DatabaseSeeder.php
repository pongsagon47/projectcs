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
            'name' => 'พนักงานแผนกออเดอร์',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'พนักงานแผนกส่งของ',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_employees')->insert([
            'name' => 'หัวหน้าห้องขนมไทย',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'หัวหน้าห้องขนมโรล',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_employees')->insert([
            'name' => 'หัวหน้าห้องขนมเค้ก',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'หัวหน้าห้องขนมคุกกี้',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'ร้านสาขา',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => 'ร้านเฟรนไชน์',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'ร้านที่รับไปขาย',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
