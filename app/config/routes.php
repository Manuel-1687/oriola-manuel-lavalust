<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** @var object $router **/

$router->get('/', 'Home::index');
$router->get('/home', 'Home::index');
$router->get('/profile', 'Home::profile');
