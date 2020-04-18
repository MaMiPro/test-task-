<?php

use App\Role;
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = new Role();
        $manager->name = 'Manager';
        $manager->slug = 'manager';
        $manager->save();

        $client = new Role();
        $client->name = 'Client';
        $client->slug = 'client';
        $client->save();
        
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'admin';
        $admin->save();
    }
}
