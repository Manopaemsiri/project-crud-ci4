<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model {
    protected $table = 'user_table';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'gender'];
}
