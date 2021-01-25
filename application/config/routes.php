<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//
$route['default_controller'] = 'base';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// About Us
$route['about-us'] = 'base/about_us';

// Auth
$route['login'] = 'base/login';
$route['register'] = 'base/register';
