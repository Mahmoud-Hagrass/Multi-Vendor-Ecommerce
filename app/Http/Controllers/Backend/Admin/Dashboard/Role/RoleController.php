<?php

namespace App\Http\Controllers\Backend\Admin\Dashboard\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Role\StoreRoleRequest;
use App\Services\Role\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

     public static function middleware(): array
     {
        return [
            new Middleware('able:roles_all_list'        , only: ['index']),
            new Middleware('able:role_create'           , only: ['create']),
            new Middleware('able:role_update'           , only: ['edit']),
            new Middleware('able:role_delete'           , only: ['destroy']),
        ];
     }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleService->getRoles();
        return view('backend.admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = $this->roleService->storeRole($request);
        if (!$role) {
            return redirectBack(__('dashboard.error_operation'), 'error');
        }
        return redirectBack(__('dashboard.success_operation'), 'success');
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
        $role = $this->roleService->findRoleById($id);
        if (!$role) {
            return redirectBack(__('dashboard.error_operation'), 'error');
        }
        return view('backend.admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, string $id)
    {
        $updatedRole = $this->roleService->updateRole($id, $request->only(['name', 'permissions']));
        if (!$updatedRole) {
            return redirectBack(__('dashboard.error_operation'), 'error');
        }
        return redirectBack(__('dashboard.success_operation'), 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roleDeleted = $this->roleService->deleteRole($id);
        if (!$roleDeleted) {
            return redirectBack(__('dashboard.error_operation'), 'error');
        }
        return redirectBack(__('dashboard.success_operation'), 'success');
    }
}
