<?php

namespace App\Modules\UserManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = [
        'name',
        'action',
        'controller',
        'group_name',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permission', 'permission_id', 'role_id');
    }
}
