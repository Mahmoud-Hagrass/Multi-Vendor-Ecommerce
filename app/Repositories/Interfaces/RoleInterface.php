<?php

namespace App\Repositories\Interfaces;

interface RoleInterface
{
    public function storeRole($request) ;
    public function getRoles() ;
    public function findRoleById($id) ;
    public function updateRole($role, array $data);
    public function deleteRole($role) ;
}
