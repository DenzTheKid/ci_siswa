<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Routes CRUD Siswa (Tambah, Hapus, Edit)
$routes->post('home/tambah', 'Home::tambah');
$routes->get('home/hapus/(:segment)', 'Home::hapus/$1');
$routes->post('home/edit/(:segment)', 'Home::edit/$1');