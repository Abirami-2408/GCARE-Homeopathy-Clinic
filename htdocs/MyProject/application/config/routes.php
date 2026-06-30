
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']   = 'Home';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin']           = 'Admin/dashboard';
$route['auth/login']     = 'Auth/login';
$route['auth/logout']    = 'Auth/logout';
$route['admin/dashboard'] = 'Admin/dashboard';

$route['admin/add_slider']            = 'Admin/add_slider';
$route['admin/manage_slider']         = 'Admin/manage_slider';
$route['admin/edit_slider/(:num)']    = 'Admin/edit_slider/$1';
$route['admin/delete_slider/(:num)']  = 'Admin/delete_slider/$1';

$route['admin/add_service']           = 'Admin/add_service';
$route['admin/manage_service']        = 'Admin/manage_service';
$route['admin/edit_service/(:num)']   = 'Admin/edit_service/$1';
$route['admin/delete_service/(:num)'] = 'Admin/delete_service/$1';

$route['admin/add_review']            = 'Admin/add_review';
$route['admin/manage_review']         = 'Admin/manage_review';
$route['admin/edit_review/(:num)']    = 'Admin/edit_review/$1';
$route['admin/delete_review/(:num)']  = 'Admin/delete_review/$1';
