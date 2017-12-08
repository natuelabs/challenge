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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the product guide for complete details:
|
| https://codeigniter.com/product_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'client';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| -------------------------------------------------------------------------
| REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/products'] = 'api/product/products'; // All Products
$route['api/specs'] = 'api/spec/specs'; // All Product Specifications
$route['api/product/(:num)'] = 'api/product/products/id/$1'; // single
$route['api/product/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/product/products/id/$1/format/$3$4'; // Example 8


/*
| -------------------------------------------------------------------------
| REST API Client Routes
| -------------------------------------------------------------------------
*/
$route['view_product/(:num)'] = 'client/view_product/$1'; // single
$route['view_all_products'] = 'client/view_products'; // single
$route['specs'] = 'client/specs'; // List of specifications
$route['view_all_products/([price|id|name].+)/([asc|desc].+)'] = 'client/view_products/$1/$2'; 
 
