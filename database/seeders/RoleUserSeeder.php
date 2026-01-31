<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesArr = ['Admin' => 'admin', 'Viewer' => 'viewer'];
        foreach ($rolesArr as $name => $slug) {
            Role::updateOrCreate(['name' => $name, 'slug' => $slug]);
        }

        $users = User::all();

        foreach ($users as $user) {
            $user->roles()->sync(Role::inRandomOrder()->first()->id);
        }


    }
}
