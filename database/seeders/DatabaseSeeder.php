<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'password' => Hash::make('admin'),
         ]);
         \App\MOdels\Status::create([
             'status'=>'talaba'
         ]);
        \App\MOdels\Status::create([
            'status'=>'ishsizlar'
        ]);
        \App\MOdels\Status::create([
            'status'=>'imkoniyati cheklanganlar'
        ]);
        \App\MOdels\Status::create([
            'status'=>'ayollar daftari'
        ]);
        \App\MOdels\Status::create([
            'status'=>'temir daftar'
        ]);
        \App\MOdels\Status::create([
            'status'=>'kam ta\'minlanganlar'
        ]);
    }
}
