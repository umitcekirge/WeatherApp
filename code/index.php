<?php
$apikey = 'APIKEY';
require_once "router.php";
require_once "class.accuweather.php";
route('/', function () {
	global $apikey;
	$accuweather = new Accuweather($apikey);
	$accuweather->type = 'daily';
	$accuweather->locationKey = $_COOKIE['weatherLocationKey'];
	$accuweather->daily = '5day';
	$accuweather->metric = 'true';
	$accuweather->details = 'true';
	$accuweather->lunch();
	$accuweather->beautifier();
	$weatherData = $accuweather->data;
    include_once "view.index.php";
});
route('/api/getlocations', function () {
	global $apikey;
	( isset($_POST['q']) ) ? $location = htmlspecialchars($_POST['q']) : $location = 'adana';
	$accuweather = new Accuweather($apikey);
	$accuweather->type = 'autocomplete';
	$accuweather->q = $location;
	$accuweather->lunch();
	echo json_encode($accuweather->data);
});

route('/api/setlocation', function () {
	if( isset($_POST['key']) && isset($_POST['location']) && isset($_POST['locationcountry'])){
		setcookie("weatherLocationKey", htmlspecialchars($_POST['key']), time() + (60*60*24), '/');
		setcookie("weatherLocation", htmlspecialchars($_POST['location']), time() + (60*60*24), '/');
		setcookie("weatherLocationCountry", htmlspecialchars($_POST['locationcountry']), time() + (60*60*24), '/');
	}
});

$action = $_SERVER['REQUEST_URI'];
dispatch($action);