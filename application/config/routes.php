<?php
require_once APPPATH . 'config/installer_bootstrap.php';

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
$route['default_controller'] = 'home';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;
$route['install'] = 'installer/index';
$route['install/success'] = 'installer/success';

if (!cms_installer_is_installed()) {
    $route['default_controller'] = 'installer';
    $route['404_override'] = 'installer/index';
    $route['(.+)'] = 'installer/index';
    return;
}
$route['admin/global'] = 'admincommands/global';
$route['admin/direct'] = 'admincommands/direct';
$route['admin/proximity'] = 'admincommands/proximity';
$route['admin/ban'] = 'admincommands/ban';
$route['admin/unban'] = 'admincommands/unban';
$route['admin/mute'] = 'admincommands/mute';
$route['admin/unmute'] = 'admincommands/unmute';
$route['admin/kick'] = 'admincommands/kick';
$route['admin/kill'] = 'admincommands/kill';
$route['admin/tp'] = 'admincommands/tp';
$route['admin/addnews'] = 'admincontent/addnews';
$route['admin/delnews'] = 'admincontent/delnews';
$route['admin/editnews'] = 'admincontent/editnews';
$route['admin/editnewss'] = 'admincontent/editnewss';
$route['admin/statusnews'] = 'admincontent/statusnews';
$route['admin/addproduct'] = 'admincontent/addproduct';
$route['admin/delproduct'] = 'admincontent/delproduct';
$route['admin/editproduct'] = 'admincontent/editproduct';
$route['admin/editproducts'] = 'admincontent/editproducts';
$route['admin/statusproduct'] = 'admincontent/statusproduct';
$route['admin/adminadd'] = 'admincommunity/adminadd';
$route['admin/deladminaccount'] = 'admincommunity/deladminaccount';
$route['admin/addchangelog'] = 'admincommunity/addchangelog';
$route['admin/delchangelog'] = 'admincommunity/delchangelog';
$route['products/(:any)'] = 'products/details/$1';
$route['news/(:any)'] = 'news/details/$1';
