<?php namespace App\Models;
use CodeIgniter\Model;
class CostumeSizeModel extends Model {
    protected $table = 'costume_sizes';
    protected $allowedFields = ['costume_id', 'size'];
}