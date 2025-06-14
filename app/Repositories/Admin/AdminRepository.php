<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
use App\Models\Role;
use App\Repositories\Interfaces\AdminInterface;

class AdminRepository implements AdminInterface
{
    public function getAll()
    {
        $admins = Admin::basicSelect()->orderByAsscending()->withRole()->active()->paginate(6) ;
        if(!$admins){
            return false ;
        }
        return $admins ;
    }

    public function getOne($id)
    {
        $admin = Admin::basicSelect()->find($id) ;
        if(!$admin){
            return false ;
        }
        return $admin ;
    }
    public function changeStatus($admin)
    {
        if($admin->status === __('dashboard.active')){
            $adminUpdated = $admin->update([
                'status' => 0 ,
            ]) ;
        }else{
            $adminUpdated = $admin->update([
                'status' => 1 ,
            ]) ;
        }
        return $adminUpdated ;
    }

    public function getAllRoles()
    {
        $roles = Role::get() ;
        if(!$roles){
            return false ;
        }
        return $roles ;
    }

    public function create($data)
    {
        $admin = Admin::create($data) ;
        if(!$admin){
            return false ;
        }
        return $admin ;
    }

    public function update($admin, $data)
    {
        $adminUpdated = $admin->update($data) ;
        if(!$adminUpdated){
            return false ;
        }
        return $adminUpdated ;
    }

    public function delete($admin)
    {
        $deletedAdmin =$admin->delete() ;
        if(!$deletedAdmin){
            return false ;
        }
        return $deletedAdmin ;
    }

    public function getAllInactive()
    {
        $inactiveAdmins = Admin::where('status' , 0)->paginate(6) ;
        if(!$inactiveAdmins){
            return false ;
        }
        return $inactiveAdmins ;
    }
}
