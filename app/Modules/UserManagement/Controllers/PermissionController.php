<?php

namespace App\Modules\UserManagement\Controllers;

use App\Core\Http\BaseController;
use App\Http\Requests\permission\create;
use App\Modules\UserManagement\Repositories\Interfaces\PermissionRepositoryInterface;
class PermissionController extends BaseController
{
    private $view;
    protected $repo;
    public function __construct(PermissionRepositoryInterface $repo)
    {
        $this->repo = $repo;
        $this->view = 'UserManagement::permission';
    }

    public function index()
    {
        $data['header_title'] = 'Permission List';
        $data['permissions'] = $this->repo->getAllPermission();


        return view($this->view . '.index', ['data' => $data]);
    }

    public function create()
    {
        $data['header_title'] = 'Add Permission';
        return view($this->view . '.create', ['data' => $data]);
    }

    public function store(create $request)
    {
        $data = $request->only($this->repo->getModel()->getFillable());
        $result = $this->repo->createRecord($data);
       return $result
       ? $this->redirectWithSuccess('permission.index', 'Created Successfully')
       : $this->redirectWithError('permission.index', 'Something went wrong');
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit Permission';
        $data['permission'] = $this->repo->editRecord($id);
        return view($this->view . '.edit', ['data' => $data]);
    }

    public function update(create $request, $id)
    {
        $data = $request->only($this->repo->getModel()->getFillable());
        $result = $this->repo->updateRecord($id, $data);
        return $result
        ? $this->redirectWithSuccess('permission.index', 'Updated Successfully')
        : $this->redirectWithError('permission.index', 'Something went wrong');
    }

    public function delete($id)
    {
        $result = $this->repo->deleteRecord($id);
        return $result
        ? $this->redirectWithSuccess('permission.index', 'Deleted Successfully')
        : $this->redirectWithError('permission.index', 'Something went wrong');
    }

}
