<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'front';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['profil/(:any)'] = 'profil';