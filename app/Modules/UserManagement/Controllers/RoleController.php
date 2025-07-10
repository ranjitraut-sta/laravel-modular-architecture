<?php

namespace App\Modules\UserManagement\Controllers;

use App\Core\Http\BaseController;
use App\Modules\UserManagement\Repositories\Implementations\PermissionRepository;
use App\Modules\UserManagement\Repositories\Interfaces\RoleRepositoryInterface;
use App\Modules\UserManagement\Requests\role\create;

class RoleController extends BaseController
{
    private $view;
    protected $repo, $permissionRepo;
    public function __construct(RoleRepositoryInterface $repo, PermissionRepository $permissionRepo)
    {
        $this->repo = $repo;
        $this->permissionRepo = $permissionRepo;
        $this->view = 'UserManagement::role';
    }

    public function index()
    {
        $data['header_title'] = 'Role List';
        $data['roles'] = $this->repo->getAll();
        return view($this->view . '.index', ['data' => $data]);
    }

    public function create()
    {
        $data['header_title'] = 'Add Role';
        return view($this->view . '.create', ['data' => $data]);
    }

    public function store(create $request)
    {
        $data = $request->only($this->repo->getModel()->getFillable());
        $result = $this->repo->createRecord($data);
        return $result
        ? $this->redirectWithSuccess('role.index', 'Role Created Successfully')
        : $this->redirectWithError('role.index', 'Something went wrong');
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Role';
        $data['role'] = $this->repo->editRecord($id);
        return view($this->view . '.edit', ['data' => $data]);
    }

    public function update(create $request, $id)
    {
        $data = $request->only($this->repo->getModel()->getFillable());
        $result = $this->repo->updateRecord($id, $data);
        return $result
        ? $this->redirectWithSuccess('role.index', 'Role Updated Successfully')
        : $this->redirectWithError('role.index', 'Something went wrong');
    }

    public function delete($id)
    {
        $result = $this->repo->deleteRecord($id);
        return $result
        ? $this->redirectWithSuccess('role.index', 'Deleted Successfully')
        : $this->redirectWithError('role.index', 'Something went wrong');
    }

    public function addPermission($id)
    {
        $data['header_title'] = 'Add Permission';
        $data['RoleId'] = $id;

        $data['permissions'] = $this->permissionRepo->getAllPermission();

        $data['getRollName'] = $this->repo->getRollNameByRoleId($id);

        // Get the permission IDs and convert to an array
        $data['roleHasPermissions'] = $this->repo->getRoleHasPermissionByRoleId($id)->toArray();
        // dd($data['permissions']);
        return view($this->view . '.add-permission', ['data' => $data]);
    }
}
