<?php

use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Role::where('slug','client')->first();
        $manager = Role::where('slug', 'manager')->first();
        $admin = Role::where('slug', 'admin')->first();

        $createTasks = Permission::where('slug','create-tasks')->first();
        $seeTasks = Permission::where('slug','see-tasks')->first();
        $replyTasks = Permission::where('slug','reply-tasks')->first();
        $closeTasks = Permission::where('slug','close-tasks')->first();
        $acceptTasks = Permission::where('slug','accept-tasks')->first();
        $openTasks = Permission::where('slug','open-tasks')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();


        $user1 = new User();
        $user1->name = 'Admin';
        $user1->email = 'admin@admin.com';
        $user1->password = bcrypt('rootroot');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($manageUsers);


        $user2 = new User();
        $user2->name = 'Manager';
        $user2->email = 'man@man.com';
        $user2->password = bcrypt('manager1');
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($acceptTasks);
        $user2->permissions()->attach($seeTasks);
        $user2->permissions()->attach($replyTasks);
        $user2->permissions()->attach($openTasks);


        $user3 = new User();
        $user3->name = 'Client1';
        $user3->email = 'cli@cli.com';
        $user3->password = bcrypt('client11');
        $user3->save();
        $user3->roles()->attach($client);
        $user3->permissions()->attach($createTasks);
        $user3->permissions()->attach($closeTasks);
        $user3->permissions()->attach($openTasks);
        $user3->permissions()->attach($seeTasks);

    }
}
