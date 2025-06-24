<?php namespace App\Models;
use CodeIgniter\Model;
class ReviewModel extends Model {
    protected $table = 'reviews';
    protected $allowedFields = ['costume_id', 'user_id', 'rating', 'comment'];
}