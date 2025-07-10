<?php
namespace App\Modules\UserManagement\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getModel();
    public function getAll();
    public function createRecord(array $data);
    public function editRecord($id);
    public function updateRecord($id, array $data);
    public function deleteRecord($id);
    public function getUsers();
    public function keepLastLogin($userId);
}
