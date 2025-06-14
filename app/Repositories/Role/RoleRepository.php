<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\Interfaces\RoleInterface;

class RoleRepository implements RoleInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function storeRole($request)
    {
        $role = Role::create([
            'name'          => $request->name,
            'permissions'   => json_encode($request->permissions),
        ]);

        if (!$role) {
            return false;
        }
        return $role;
    }

    public function getRoles()
    {
        $roles = Role::basicSelect()->adminCounts()->paginate(5);
        if (!$roles) {
            return false;
        }
        return $roles;
    }

    public function findRoleById($id)
    {
        $role = Role::basicSelect()->adminCounts()->find($id);
        if (!$role) {
            return false;
        }
        return $role;
    }


    public function updateRole($role, array $data)
    {
        $updatedRole = $role->update($data);

        if(!$updatedRole){
            return false ;
        }
        return $updatedRole ;
    }

    public function deleteRole($role)
    {
        if (!$role || $role->admins_count > 0) {
            return false;
        }
        return $role->delete();
    }
}
