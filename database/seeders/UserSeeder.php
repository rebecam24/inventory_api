<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id'       => 1,
            'email'         => 'admin@admin.com',
            'password'      =>  bcrypt('12345678'), // password
            'name'          => 'Administrador',
            'lastname'      => 'P',
            'birthday'      => '1990-01-01',
            'phone'         => '55551112233',
            'address'       => 'Tachira',
            'id_number'     => '12345678',
            'work_position' =>  'owner',
            'gender'        => 'female',
        ]);
    }
}
