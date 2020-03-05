<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'ห้องขนมไทย',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'ห้องขนมโรล',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'ห้องขนมบราวนี่',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'ห้องขนมเค้ก',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_employees')->insert([
            'name' => 'ห้องขนมคุกกี้',
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

        DB::table('employees')->insert([
            'username' => 'admin',
            'password' => Hash::make('123456'), // <---- check this
            'email' => 'example@gmail.com',
            'first_name' => 'Site',
            'last_name' => 'Admin',
            'nickname' => 'tak',
            'image' => 'No-picture',
            'id_card' => '1 3599 00058 165',
            'phone_number' => '0616274629',
            'address' => "Address",
            'role_employee_id' => 1,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('promotions')->insert([
            'promotion_name' => 'ร้านสาขา',
            'promotion_description' => 'โปรโมชั่นสำหรับร้านสาขา',
            'promotion_discount' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('promotions')->insert([
            'promotion_name' => 'ร้านเฟรนไชน์',
            'promotion_description' => 'โปรโมชั่นสำหรับร้านเฟรนไชน์',
            'promotion_discount' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('promotions')->insert([
            'promotion_name' => 'ร้านที่รับไปขาย',
            'promotion_description' => 'โปรโมชั่นสำหรับร้านที่รับไปขาย	',
            'promotion_discount' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
