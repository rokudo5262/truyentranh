<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['']                      = 'main/index';

$route['admin']                 = 'admin/login';
$route['admin/dashboard']       = 'admin/dashboard';
$route['admin/signin']          = 'admin/signin';
$route['admin/signout']         = 'admin/signout';
$route['admin/login']           = 'admin/login';
$route['admin/register']        = 'admin/register';
$route['admin/forgot_password'] = 'admin/forgot_password';

$route['admin/staffs']          = 'staff/index';
$route['admin/staff/(:num)']    = 'staff/staff/$1';
$route['admin/handle_staff']    = 'staff/handle_staff';

$route['admin/authors']         = 'author/index';
$route['admin/author/(:num)']   = 'author/author/$1';
$route['admin/handle_author']   = 'author/handle_author';

$route['admin/genres']          = 'genre/index';
$route['admin/genre/(:num)']    = 'genre/genre/$1';
$route['admin/handle_genre']    = 'type/handle_genre';

$route['admin/types']           = 'type/index';
$route['admin/type/(:num)']     = 'type/type/$1';
$route['admin/handle_type']     = 'type/handle_type';

$route['admin/books']           = 'comic/index';
$route['admin/book/(:num)']     = 'comic/comic/$1';
$route['admin/handle_book']     = 'type/handle_book';

$route['admin/statuses']        = 'status/index';
$route['admin/status/(:num)']   = 'status/status/$1';
$route['admin/handle_status']   = 'status/handle_status';

$route['admin/users']           = 'user/index';
$route['admin/user/(:num)']     = 'user/user/$1';
$route['admin/handle_user']     = 'user/handle_user';
