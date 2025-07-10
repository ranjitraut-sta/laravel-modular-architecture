<?php

namespace App\Modules\UserManagement\Controllers;

use App\Core\Http\BaseController;
use App\Modules\UserManagement\Repositories\Implementations\RoleRepository;
use App\Modules\UserManagement\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    private $view;
    protected $repo, $roleRepo;
    public function __construct(UserRepositoryInterface $repo, RoleRepository $roleRepo)
    {
        $this->view = 'UserManagement::user';
        $this->repo = $repo;
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $data['header_title'] = 'User List';
        $data['users'] = $this->repo->getUsers();


        return view($this->view . '.index', ['data' => $data]);
    }

    public function create()
    {
        $data['header_title'] = 'Add User';
        $data['roles'] = $this->roleRepo->getAll();
        return view($this->view . '.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->only($this->repo->getModel()->getFillable());

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $result = $this->repo->createRecord($data);
        return $result
        ? $this->redirectWithSuccess('user.index', 'User Created Successfully')
        : $this->redirectWithError('user.index', 'Something went wrong');
    }

    public function edit($id)
    {
        $data['header_title'] = 'Edit User';
        $data['user'] = $this->repo->editRecord($id);
        $data['roles'] = $this->roleRepo->getAll();
        return view($this->view . '.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data['user'] = $this->repo->editRecord($id);
        $data = $request->only($this->repo->getModel()->getFillable());
        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $result = $this->repo->updateRecord($id, $data);
        return $result
        ? $this->redirectWithSuccess('user.index', 'Updated Successfully')
        : $this->redirectWithError('user.index', 'Something went wrong');
    }

    public function delete($id)
    {
        $result = $this->repo->deleteRecord($id);
       return $result
       ? $this->redirectWithSuccess('user.index', 'Deleted Successfully')
       : $this->redirectWithError('user.index', 'Something went wrong');
    }

}
