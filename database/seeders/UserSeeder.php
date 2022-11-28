<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Guru BK1';
        $user->username = 'guru1';
        $user->email = 'guru1@gmail.com';
        $user->password = Hash::make('password');
        $user->jabatan = 'Guru BK';
        $user->role = '1';
        $user->save();

        $user = new User;
        $user->name = 'Guru BK2';
        $user->username = 'guru2';
        $user->email = 'guru2@gmail.com';
        $user->password = Hash::make('password');
        $user->jabatan = 'Guru BK';
        $user->role = '1';
        $user->save();

        $user = new User;
        $user->name = 'Panitia PPDB2';
        $user->username = 'panitia1';
        $user->email = 'panitia1@gmail.com';
        $user->password = Hash::make('password');
        $user->jabatan = 'Panitia PPDB';
        $user->role = '2';
        $user->save();

        $user = new User;
        $user->name = 'Panitia PPDB2';
        $user->username = 'panitia2';
        $user->email = 'panitia2@gmail.com';
        $user->password = Hash::make('password');
        $user->jabatan = 'Panitia PPDB';
        $user->role = '2';
        $user->save();

    }
}
