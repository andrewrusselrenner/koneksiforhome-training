<?php

namespace App\Models;

use CodeIgniter\Model;

class LanggananModel extends Model
{
    protected $table = 'langganan';
    protected $primaryKey = 'langgananId';
    protected $allowedFields = ['langgananId', 'pelangganId', 'paketId', 'tanggal'];

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    //add something below 
}
