<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\CostumeModel;

class DashboardController extends BaseController
{
    public function index()
    {
        // Inisialisasi model
        $categoryModel = new CategoryModel();
        $costumeModel = new CostumeModel();
        $carouselImages = [
            ['src' => 'carousel-1.jpg', 'alt' => 'Sewa Kostum Berkualitas'],
            ['src' => 'carousel-2.jpg', 'alt' => 'Berbagai Macam Pilihan'],
            ['src' => 'carousel-3.jpg', 'alt' => 'Harga Terjangkau'],
        ];

        // Ambil data dari database
        $data = [
            'title'      => 'Selamat Datang di My Costume',
            'carouselImages' => $carouselImages,
            'categories' => $categoryModel->findAll(),
            'costumes'   => $costumeModel->findAll(8) // Ambil 8 kostum terbaru/rekomendasi
        ];

        // Tampilkan view dan kirim data
        return view('dashboard', $data);
    }
}