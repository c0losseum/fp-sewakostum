<?php

namespace App\Models;

use CodeIgniter\Model;

class CostumeModel extends Model
{
    protected $table            = 'costumes';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'category_id',
        'name',
        'description',
        'price',
        'rental_duration_days',
        'rating',
        'image_url'
    ];
}