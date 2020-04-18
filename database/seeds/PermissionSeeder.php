<?php

use App\Permission;
use Illuminate\Database\Seeder;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // создать заявку
        $createTasks = new Permission();
        $createTasks->name = 'Create Tasks';
        $createTasks->slug = 'create-tasks';
        $createTasks->save();
        // смотреть список заявок
        $seeTasks = new Permission();
        $seeTasks->name = 'See Tasks';
        $seeTasks->slug = 'see-tasks';
        $seeTasks->save();
        // ответить на заявку
        $replyTasks = new Permission();
        $replyTasks->name = 'Reply Tasks';
        $replyTasks->slug = 'reply-tasks';
        $replyTasks->save();
        // закрыть заявку
        $closeTasks = new Permission();
        $closeTasks->name = 'Close Tasks';
        $closeTasks->slug = 'close-tasks';
        $closeTasks->save();
        // принять заявку
        $acceptTasks = new Permission();
        $acceptTasks->name = 'Accept Tasks';
        $acceptTasks->slug = 'accept-tasks';
        $acceptTasks->save();
        // открыть заявку
        $openTasks = new Permission();
        $openTasks->name = 'Open Tasks';
        $openTasks->slug = 'open-tasks';
        $openTasks->save();
        // управлять пользователями - только для админа    
        $manageUser = new Permission();
        $manageUser->name = 'Manage users';
        $manageUser->slug = 'manage-users';
        $manageUser->save();
    }
}
