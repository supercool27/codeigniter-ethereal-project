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
//$route['default_controller'] = 'BlogController';
//$route['default_controller'] = 'AdminController/dashboard';

$route['default_controller'] = 'AdminController/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'BlogController/index';
$route['create'] = 'BlogController/create';
$route['delete'] = 'BlogController/delete';

//$route['delete/(:num)'] = 'BlogController/delete/$1';

$route['store']='BlogController/store';
$route['edittable/(:any)']='BlogController/edit/$1';
$route['doeditable/(:any)'] = 'BlogController/doedit/$1';

$route['listview'] = 'BlogController/blogview';
$route['bloglist'] ='BlogController/blogviewonly';
$route['cdndatatable'] ='BlogController/cdndatatable'; 
$route['blogdatatable/(:num)']='BlogController/datatableonly';
$route['viewdatatable'] = 'BlogController/viewdatatable';

$route['demo']= 'BlogController/demo_toggle';
$route['home']= 'BlogController/bloghome';
$route['comment']='BlogController/showComment';

$route['insert_comment']='CommentController/insert';
$route['admincomment']='CommentController/show_comment';

//below code is standard code format. Strictly follow the rule. 

$route['dashboard']='AdminController/dashboard';
$route['forgotpassword']= 'AdminController/forgot_password';
$route['login'] = 'AdminController/login';
$route['logout']='AdminController/logout';
$route['otp']='AdminController/otp_view';
$route['admin/otp_verify']= 'AdminController/otp_verify';
//otp Verification using UUID  
$route['admin/otp_verify/:(any)']='AdminController/otp_verify';
$route['user/resend'] ='AdminController/resend';
// admin registeration as same as end user registration



$route['register']='AdminController/register';
$route['reset']='AdminController/reset';
$route['admin/create']='AdminController/create';
$route['admin/login']='AdminController/login_check';


$route['dashboard/post'] = 'BlogController/index';
$route['dashboard/post/create'] = 'BlogController/create';
$route['dashboard/post/store'] = 'BlogController/store';
$route['dashboard/post/edit/(:any)'] = 'BlogController/edit/$1';
$route['dashboard/post/update'] = 'BlogController/update';
$route['dashboard/post/view/(:any)'] = 'BlogController/view/$1';
$route['dashboard/post/delete'] = 'BlogController/delete';

$route['dashboard/comment'] = 'CommentController/index';
$route['dashboard/comment/create'] = 'CommentController/create';
$route['dashboard/comment/store'] = 'CommentController/store';
$route['dashboard/comment/edit/(:any)'] = 'CommentController/edit/$1';
$route['dashboard/comment/update'] = 'CommentController/update';
$route['dashboard/comment/view/(:any)'] = 'CommentController/view/$1';
$route['dashboard/comment/delete'] = 'CommentController/delete';


$route['dashboard/comment/create'] = 'CommentController/create';
$route['dashboard/comment/store'] = 'CommentController/store';
$route['dashboard/comment/edit/(:any)'] = 'CommentController/edit/$1';
$route['dashboard/comment/update'] = 'CommentController/update';
$route['dashboard/comment/view/(:any)'] = 'CommentController/view/$1';
$route['dashboard/comment/delete'] = 'CommentController/delete';

