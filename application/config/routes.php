<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['signin'] = 'users/signin';
$route['home'] = 'administrators/admin';
$route['activities'] = 'users/activities';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
