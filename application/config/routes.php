<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'books'; // Default controller is 'Books'
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// // Custom routes for Books controller
// $route['books'] = 'books/get_books'; // Route for displaying book list (GET)
// $route['books/create'] = 'books/create'; // Route for creating a new book (POST)
// $route['books/(:num)'] = 'books/show/$1'; // Route for displaying a specific book (GET)
// $route['books/update/(:num)'] = 'books/update/$1'; // Route for updating a specific book (PUT/PATCH)
// $route['books/delete/(:num)'] = 'books/delete/$1'; // Route for deleting a specific book (DELETE)

// Custom routes for Books controller
$route['books'] = 'books/get_books'; // Route for displaying book list (GET)
$route['books/create'] = 'books/create_book'; // Route for creating a new book (POST)
$route['books/(:num)'] = 'books/get_book/$1'; // Route for displaying a specific book (GET)
$route['books/api/(:num)'] = 'books/get_book_api/$1';
$route['books/update/(:num)'] = 'books/update_book/$1'; // Route for updating a specific book (PUT/PATCH)
$route['books/delete/(:num)'] = 'books/delete_book/$1'; // Route for deleting a specific book (DELETE)

