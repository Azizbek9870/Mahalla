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
         \App\Models\Status::create([
             'status'=>'talaba'
         ]);
        \App\Models\Status::create([
            'status'=>'ishsizlar'
        ]);
        \App\Models\Status::create([
            'status'=>'imkoniyati cheklanganlar'
        ]);
        \App\Models\Status::create([
            'status'=>'ayollar daftari'
        ]);
        \App\Models\Status::create([
            'status'=>'temir daftar'
        ]);
        \App\Models\Status::create([
            'status'=>'kam ta\'minlanganlar'
        ]);
    }
}
