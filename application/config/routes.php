<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['apply'] = 'loan_applications/apply';
$route['signin'] = 'users/signin';
$route['signup'] = 'users/signup';
$route['admin'] = 'administrators/admin';
$route['member'] = 'members/member';
$route['treasurer'] = 'treasurers/treasurer';
$route['credit_officer'] = 'creditofficers/credit_officer';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
