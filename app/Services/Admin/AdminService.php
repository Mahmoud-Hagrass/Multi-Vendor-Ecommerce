<?php

namespace App\Services\Admin;

use App\Repositories\Interfaces\AdminInterface;

class AdminService
{
    protected $adminRepository;

    public function __construct(AdminInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAll()
    {
        return $this->adminRepository->getAll() ;
    }

    public function getOne($id)
    {
        return $this->adminRepository->getOne($id) ;
    }

    public function getAllRoles()
    {
        return $this->adminRepository->getAllRoles() ;
    }

    public function changeStatus($id)
    {
        $admin = $this->adminRepository->getOne($id) ;
        if(!$admin){
            return false;
        }
        return $this->adminRepository->changeStatus($admin) ;
    }

    public function create($data)
    {
        if($data['status'] == __('dashboard.active')){
            $data['status'] = 1  ;
        }else{
            $data['status'] = 0 ;
        }
        return $this->adminRepository->create($data);
    }

    public function update($data , $id)
    {
        // merge status to data (request) with 1,0
        if($data['status'] == __('dashboard.active')){
            $data['status'] = 1  ;
        }else{
            $data['status'] = 0 ;
        }

        // get admin by id
        $admin = $this->adminRepository->getOne($id) ;
        if(!$admin){
            return false;
        }

        return $this->adminRepository->update($admin , $data) ;
    }

    public function delete($id)
    {
        $admin = $this->adminRepository->getOne($id) ;
        if(!$admin){
            return false;
        }
        return $this->adminRepository->delete($admin) ;
    }

    public function getAllInactive()
    {
        return $this->adminRepository->getAllInactive();
    }
}
