<?php namespace App\Models;
use CodeIgniter\Model;
class CostumePricingModel extends Model {
    protected $table = 'costume_pricing';
    protected $allowedFields = ['costume_id', 'duration_days', 'price'];
}