<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->role = 'super-admin';
        $role->save();

        $user = new User();
        $user->name = 'super admin';
        $user->email = 'superadmin@feb-unsiq.ac.id';
        $user->password = Hash::make('jalandieng');
        $user->save();

        $role->users()->attach($user);
    }
}
