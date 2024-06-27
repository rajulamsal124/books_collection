<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'books'; // Default controller is 'Books'
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['books'] = 'books/get_books'; 
$route['books/create'] = 'books/create_book';
$route['books/(:num)'] = 'books/get_book/$1';
$route['books/api/(:num)'] = 'books/get_book_api/$1';
$route['books/update/(:num)'] = 'books/update_book/$1'; 
$route['books/delete/(:num)'] = 'books/delete_book/$1'; 

