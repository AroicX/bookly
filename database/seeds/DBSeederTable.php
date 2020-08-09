<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DBSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        for ($i = 0; $i <= 100; $i++) {
            DB::table('rooms')->insert([
                'room_id' => '0' . $i,
                'floor' => $i + 1,
            ]);
        }

        $customers = Faker::create('App\Customers');

        for ($i = 0; $i <= 200; $i++) {
            DB::table('customers')->insert([
                'customer_id' => $customers->randomNumber(9),
                'fullname' => $customers->name,
                'email' => $customers->email,
                'number' => $customers->phoneNumber,
                'address' => $customers->address,
                'nationality' => 'Nigeria',
                'gender' => 'Male',
            ]);
        }
    }
}
