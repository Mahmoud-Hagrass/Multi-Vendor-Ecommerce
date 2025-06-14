<?php

namespace App\Http\Controllers\Backend\Admin\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Admin\StoreAdminRequest;
use App\Http\Requests\Backend\Admin\Admin\UpdateAdminRequest;
use App\Services\Admin\AdminService;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AdminController extends Controller implements HasMiddleware
{
    protected $adminService ;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService ;
    }

     public static function middleware(): array
     {
         return [
             new Middleware('able:admin_active_list'       , only: ['index']),
             new Middleware('able:admin_inactive_list'     , only: ['inactiveAdmins']),
             new Middleware('able:admin_change_status'     , only: ['changeStatus']),
             new Middleware('able:admin_create'            , only: ['create']),
             new Middleware('able:admin_update'            , only: ['edit']),
             new Middleware('able:admin_delete'            , only: ['destroy']),
         ];
     }

    public function index()
    {
        $admins = $this->adminService->getAll() ;
        if(!$admins){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
        return view('backend.admin.admins.index' , compact('admins')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->adminService->getAllRoles() ;
        return view('backend.admin.admins.create' , compact('roles')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $data = $request->only(['name' , 'email' , 'password' , 'role_id' , 'status']) ;
        $admin = $this->adminService->create($data) ;
        if(!$admin){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
         return redirectToRoute(__('dashboard.success_operation') , 'success' , 'admin.admins.index') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->adminService->getAllRoles() ;
        $admin = $this->adminService->getOne($id) ;
        return view('backend.admin.admins.edit' , compact('roles' , 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, string $id)
    {
        $data = $request->only(['name' , 'email' , 'password' , 'role_id' , 'status']) ;
        $updatedAdmin = $this->adminService->update($data , $id) ;
        if(!$updatedAdmin){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
        return redirectBack(__('dashboard.success_operation') , 'success') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletedAdmin = $this->adminService->delete($id) ;
        if(!$deletedAdmin){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
        return redirectBack(__('dashboard.success_operation') , 'success') ;
    }

    public function changeStatus($id)
    {
        $adminStatus = $this->adminService->changeStatus($id) ;
        if(!$adminStatus){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
        return redirectBack(__('dashboard.success_operation') , 'success') ;
    }

    public function inactiveAdmins()
    {
        $admins = $this->adminService->getAllInactive() ;
        if(!$admins){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }
        return view('backend.admin.admins.in-active' , compact('admins')) ;
    }
}
