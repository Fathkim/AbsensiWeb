<?php

use Illuminate\Database\Seeder;

class Siswa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->name = "siswa";
        // $user->username = "admin";
        $user->email = "siswa@test.com";
        $user->level = "siswa";
        $user->password = \Hash::make('asdasdasd');
        // $user->id_mapel = null;
        $user->save();
    }
}
