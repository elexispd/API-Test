<?php
include_once "test.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$obj = new  Book();
	$requestData = json_decode(file_get_contents('php://input'), true);
	$obj->process($requestData);
}






 else {
	$obj = new  Book();
	$data = $requestData = json_decode(file_get_contents('php://input'), true);
	$obj->invalid();
}
