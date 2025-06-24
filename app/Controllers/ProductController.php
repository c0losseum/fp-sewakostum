<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CostumeModel;
use App\Models\CategoryModel;
// use App\Models\CostumeImageModel; // Pastikan baris ini dihapus atau diberi komentar
use App\Models\CostumeSizeModel;
use App\Models\CostumePricingModel;
use App\Models\ReviewModel;

class ProductController extends BaseController
{
    public function detail($id)
    {
        // Inisialisasi model
        $costumeModel = new CostumeModel();
        // $costumeImageModel = new CostumeImageModel(); // Pastikan baris ini dihapus
        $costumeSizeModel = new CostumeSizeModel();
        $costumePricingModel = new CostumePricingModel();
        $reviewModel = new ReviewModel();

        // Ambil data utama kostum & join dengan kategori untuk mendapatkan nama kategori
        $costume = $costumeModel
            ->select('costumes.*, categories.name as category_name')
            ->join('categories', 'categories.id = costumes.category_id')
            ->where('costumes.id', $id)
            ->first();

        // Jika kostum tidak ditemukan, tampilkan halaman 404
        if (!$costume) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil data pendukung
        $sizes = $costumeSizeModel->where('costume_id', $id)->findAll();
        $pricing = $costumePricingModel->where('costume_id', $id)->findAll();
        
        // Ambil ulasan & join dengan user untuk mendapatkan nama user
        $reviews = $reviewModel
            ->select('reviews.*, users.nama as user_name')
            ->join('users', 'users.id = reviews.user_id')
            ->where('costume_id', $id)
            ->findAll();

        // Siapkan semua data untuk dikirim ke view
        $data = [
            'title'   => $costume['name'],
            'costume' => $costume,
            'sizes'   => $sizes,
            'pricing' => $pricing,
            'reviews' => $reviews,
        ];

        return view('product_detail', $data);
    }
}