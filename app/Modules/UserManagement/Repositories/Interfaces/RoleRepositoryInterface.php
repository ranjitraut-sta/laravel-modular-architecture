<?php
namespace App\Modules\UserManagement\Repositories\Interfaces;

interface RoleRepositoryInterface
{
    public function getAll();
    public function getModel();
    public function createRecord(array $data);
    public function editRecord($id);
    public function updateRecord($id, array $data);
    public function deleteRecord($id);
    public function getRollNameByRoleId($id);
    public function getRoleHasPermissionByRoleId($id);
}
