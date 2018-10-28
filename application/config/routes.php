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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//main page routes
$route['super_admin'] = 'Home/super_admin';
$route['super_admin_valid'] = 'Home/super_admin_valid';
$route['seller_admin'] = 'Home/seller_admin';
$route['seller_admin_valid'] = 'Home/seller_admin_valid';
$route['seller_forgot'] = 'Home/seller_forgot';
$route['seller_forgot_valid'] = 'Home/seller_forgot_valid';
$route['seller_forgot_form/(:any)'] = 'Home/seller_forgot_form/$1';
$route['seller_forgot_submit/(:any)'] = 'Home/seller_forgot_submit/$1';

//super admin routes
$route['su_dashboard'] = 'Super_admin/dashboard';
$route['su_restaurant_add'] = 'Super_admin/restaurant_add';
$route['su_restaurant_add_sub'] = 'Super_admin/restaurant_add_submit';
$route['su_restaurant_edit_sub/(:any)'] = 'Super_admin/restaurant_edit_submit/$1';
$route['su_restaurants'] = 'super_admin/all_restaurants';
$route['su_srestaurant/(:any)'] = 'super_admin/single_restaurant/$1';
$route['su_erestaurant/(:any)'] = 'super_admin/edit_single_restaurant/$1';
$route['su_users'] = 'super_admin/all_users';
$route['su_DeliveryBoys'] = 'super_admin/deliveryBoysList';
$route['su_addDeliveryBoy'] = 'super_admin/addDeliveryBoy';
$route['su_sliders'] = 'super_admin/sliders';
$route['su_slider_add'] = 'super_admin/slider_add';
$route['su_banners'] = 'super_admin/banners';
$route['su_banner_add'] = 'super_admin/banner_add';
$route['su_logout'] = 'Super_admin/logout';

//seller admin routes
$route['se_dashboard'] = 'Seller_admin/dashboard';
$route['se_profile'] = 'Seller_admin/restaurant_view';
$route['se_change_pass'] = 'Seller_admin/change_password';
$route['se_products']='Seller_admin/productList';
$route['se_addProduct']='Seller_admin/addProduct';
$route['se_categories']='Seller_admin/productCategories';
$route['se_addCategory']='Seller_admin/addCategory';
$route['se_categorySubmit']='Seller_admin/addNewCategory';


