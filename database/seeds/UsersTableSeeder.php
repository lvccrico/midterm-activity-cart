<?php

use App\Customer;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::create([
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'address' => 'Barangay Pitong Gatang' 
        ]);

        $user = new User;
        $user->email = 'juan.dela.cruz@example.com';
        $user->password = bcrypt('secret123');

        $customer->user()->save($user);
    }
}
