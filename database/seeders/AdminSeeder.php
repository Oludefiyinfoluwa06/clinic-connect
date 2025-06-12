<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name'     => 'Super Admin',
            'email'    => 'super.admin@schoolclinic.test',
            'password' => Hash::make('abcABC123!'),
        ]);
    }
}
