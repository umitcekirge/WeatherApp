<?php
$routes = [];
function route($action, Closure $callback)
{
    global $routes;
    $action = trim($action, '/');
    $routes[$action] = $callback;
}

function dispatch($action)
{
    global $routes;
    $action = trim($action, '/');
    $callback = $routes[$action];
	if(!isset($_COOKIE['weatherLocationKey']) && !isset($_COOKIE['weatherLocation']) && !isset($_COOKIE['weatherLocationCountry'])) {
		setcookie("weatherLocationKey", 316649, time() + (60*60*24));
		setcookie("weatherLocation", 'Adana', time() + (60*60*24));
		setcookie("weatherLocationCountry", 'Turkey', time() + (60*60*24));
	}
	
    echo call_user_func($callback);
}