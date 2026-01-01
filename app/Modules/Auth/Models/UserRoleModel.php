<?php

namespace App\Modules\Auth\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table            = 'user_roles';
    protected $primaryKey       = 'URID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['UID', 'WorkstationID', 'UserGroupID', 'UnitID', 'Active', 'CreateDate', 'CreateUser', 'LastUpdate', 'LastUpdateUser'];

    protected $useTimestamps = false;
    protected $createdField  = 'CreateDate';
    protected $updatedField  = 'LastUpdate';
}
