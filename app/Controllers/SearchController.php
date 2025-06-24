<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CostumeModel;

class SearchController extends BaseController
{
    public function index()
    {
        // Ambil kata kunci dari URL (?keyword=...)
        $keyword = $this->request->getGet('keyword');

        $costumeModel = new CostumeModel();
        $costumes = [];

        // Hanya lakukan pencarian jika ada kata kunci
        if ($keyword && trim($keyword) !== '') {
            $costumes = $costumeModel
                ->like('name', $keyword)
                ->orLike('description', $keyword)
                ->findAll();
        }

        $data = [
            'title'    => 'Hasil Pencarian untuk "' . esc($keyword) . '"',
            'costumes' => $costumes,
            'keyword'  => $keyword
        ];

        return view('search_results', $data);
    }
}