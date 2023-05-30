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
        $user->name = "gharyn";
        $user->email = "persolna1243@gmail.com";
        $user->barcode = \Hash::make('9oi9nv3');
        $user->level = "siswa";
        $user->password = \Hash::make('gharyn');
        $user->save();
    }
}
