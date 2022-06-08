<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['topics/index'] = 'topics/index';
$route['topics/create'] = 'topics/create';
$route['topics/update'] = 'topics/update';
$route['topics/update_rating'] = 'topics/update_rating';
$route['topics/(:any)'] = 'topics/view/$1';
$route['topics'] = 'topics/index';

$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/topics/update_rating'] = 'categories/topics/update_rating';
$route['categories/topics/(:any)'] = 'categories/topics/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
