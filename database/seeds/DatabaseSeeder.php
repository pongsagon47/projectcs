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

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('123456'), // <---- check this
            'email' => 'pongsagon405@gmail.com',
            'first_name' => 'Site',
            'last_name' => 'Admin',
            'nickname' => 'tak',
            'id_card' => '1 3599 00058 165',
            'phone_number' => '0616274629',
            'address' => '130/9 ต.กู่กาสิงห์ อ.เกษตรวิสัย จ.ร้อยเอ็ด 45150',
            'role_employee_id' => '1',
            'created_at' => now(),
            'updated_at' => now()

        ]);

    }
}
