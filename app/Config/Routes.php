<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ... (kode rute yang sudah ada)

//$routes->get('/', 'AuthController::login'); // Arahkan halaman utama ke login
$routes->get('/', 'DashboardController::index');
// Rute untuk proses otentikasi
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::register');
//$routes->get('/dashboard', 'AuthController::dashboard');
$routes->get('/logout', 'AuthController::logout');
// ... (rute yang sudah ada)

// Jadikan DashboardController sebagai halaman utama


// Rute ini juga bisa diarahkan ke controller yang sama jika diperlukan
$routes->get('/dashboard', 'DashboardController::index');

// Rute untuk proses otentikasi

// Hapus atau beri komentar pada rute dashboard yang lama ke AuthController
// $routes->get('/dashboard', 'AuthController::dashboard');
// ... (rute lainnya)

// Rute untuk detail produk, (:num) adalah placeholder untuk ID produk
$routes->get('/produk/(:num)', 'ProductController::detail/$1');
// ... (rute lainnya yang sudah ada)

// Rute untuk pencarian
$routes->get('/search', 'SearchController::index');