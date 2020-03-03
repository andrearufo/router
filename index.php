<?php

require_once 'router.php';

$router = new Router();

$router->get('/',           'pages/home.php');
$router->get('/about-me',   'pages/about.php');
$router->get('/foo',        'pages/test.php');
$router->get('/foo/bar',  'pages/test.php');
$router->get('/foo/andrea',  'pages/test.php');
$router->get('/foo/[bar]',  'pages/test.php');

$router->get('/bar',        'pages/test.php');
$router->post('/bar',       'pages/test.php');

$router->any('/test',       'pages/test.php');

// $router->error('404',       'pages/404.php');

$router->debug();
$router->go();
