<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'      => 'super admin' ,
            'email'     => 'superadmin@superadmin.com' ,
            'password'  => Hash::make('123456789') ,
            'role_id'   => Role::first()->id ,
            'image'     => '' ,
            'status'    => 1 ,
        ]) ;
    }
}
