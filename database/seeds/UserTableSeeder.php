<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_customer = Role::where('name', 'customer')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $employee = new User();
        $employee->name = 'Customer Name';
        $employee->email = 'customer@example.com';
        $employee->password = bcrypt('secret');
        $employee->save();
        $employee->roles()->attach($role_customer);

        $manager = new User();
        $manager->name = 'Administrator';
        $manager->email = 'admin@example.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($role_admin);

    }
}
