<?php

namespace Database\Seeders;

use App\Models\Role;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin-ebfis', 'admin-digilib', 'bendahara', 'kabag-tu', 'dosen', 'kaprodi', 'dekan', 'mahasiswa'
        ];

        for ($i = 0; $i < count($roles); $i++) {
            Role::factory()->create(['role' => $roles[$i]]);
        }
    }
}
