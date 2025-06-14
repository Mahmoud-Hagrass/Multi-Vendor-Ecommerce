<?php

namespace App\Repositories\Interfaces;

use App\Models\Admin;

interface AdminInterface
{
    public function getAll() ;
    public function getOne($id) ;
    public function changeStatus(Admin $admin) ;
    public function getAllRoles() ;
    public function create($data) ;
    public function update($admin, $data) ;
    public function delete($admin) ;
    public function getAllInactive() ;
}
