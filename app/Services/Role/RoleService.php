<?php

namespace App\Services\Role;

use App\Repositories\Interfaces\RoleInterface;

class RoleService
{

    protected $roleRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(RoleInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function findRoleById($id)
    {
        return $this->roleRepository->findRoleById($id);
    }

    public function storeRole($request)
    {
        return $this->roleRepository->storeRole($request);
    }

    public function getRoles()
    {
        return $this->roleRepository->getRoles();
    }

    public function updateRole($id , array $data)
    {
        $role = $this->roleRepository->findRoleById($id);
        if(!$role){
            return false ;
        }
        return $this->roleRepository->updateRole($role, $data);
    }

    public function deleteRole($id)
    {
        $role = $this->roleRepository->findRoleById($id) ;
        if(!$role){
            return false ;
        }
        return $this->roleRepository->deleteRole($role);
    }
}
