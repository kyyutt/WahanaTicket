<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home'); // Akan redirect berdasarkan role
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // Boleh diubah ke false untuk keamanan

// 🔐 AUTH ROUTES
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');

// 🏠 HOME: Redirect user ke dashboard sesuai role
$routes->get('/', 'Home::index');

// 📂 ADMIN ROUTES (Hanya bisa diakses oleh user dengan role 'admin')
$routes->group('admin', [
    'filter' => 'admin',
    'namespace' => 'App\Controllers'
], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('ticket', 'Ticket::index');
    $routes->post('ticket/store', 'Ticket::store');
    $routes->put('ticket/update/(:num)', 'Ticket::update/$1');
    $routes->delete('ticket/delete/(:num)', 'Ticket::delete/$1');
    $routes->get('laporan', 'Laporan::laporan');
    $routes->get('user', 'User::index');
    $routes->post('user/store', 'User::store');
    $routes->put('user/update/(:num)', 'User::update/$1');
    $routes->delete('user/delete/(:num)', 'User::delete/$1'); // jika menggunakan spoofed method DELETE

});


// 📂 KASIR ROUTES (Hanya bisa diakses oleh user dengan role 'kasir')
$routes->group('kasir', ['filter' => 'kasir','namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Kasir::index');
    $routes->get('sales', 'Sales::index');
    $routes->post('sales/store', 'Sales::store');
    $routes->get('riwayat', 'Sales::riwayat');
    $routes->get('daftar-tiket', 'Sales::daftarTiket');
});
