<?php namespace App\Models;
use CodeIgniter\Model;
class CostumeImageModel extends Model {
    protected $table = 'costume_images';
    protected $allowedFields = ['costume_id', 'image_url'];
}
