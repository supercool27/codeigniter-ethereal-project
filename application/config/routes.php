<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//  
$route['default_controller'] = 'base';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// About Us
$route['about-us'] = 'base/about_us';

//
$route['login'] = 'base/login';
$route['register'] = 'base/register';
$route['registeration'] ='base/create';



//


$route['dashboard/comment'] = 'CommentController/index';
$route['dashboard/comment/create'] = 'CommentController/create';
$route['dashboard/comment/store'] = 'CommentController/store';
$route['dashboard/comment/edit/(:any)'] = 'CommentController/edit/$1';
$route['dashboard/comment/update'] = 'CommentController/update';
$route['dashboard/comment/view/(:any)'] = 'CommentController/view/$1';
$route['dashboard/comment/delete'] = 'CommentController/delete';