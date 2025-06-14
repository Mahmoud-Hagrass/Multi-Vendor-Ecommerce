<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configPermissions = [] ;
        foreach(config('permissions_en.permissions') as $key => $permission) {
            $configPermissions[] = $key ;
        }

        Role::create([
            'name' => [
                'en' => 'super_admin' ,
                'ar' => 'المشرف العام' ,
            ] ,

            'permissions' => json_encode($configPermissions) ,
        ]) ;
    }
}
