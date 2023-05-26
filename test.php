<?php


class Book{
	


	function process($requestData){
		// Set the response status code
		http_response_code(200); // Set the appropriate status code here
		if (empty($requestData["age"]) || empty($requestData["name"])) {
			// Create the response data
			$responseData = [
			    'status' => 'failed',
			    'message' => 'All fields must be field.',
			];
		} else {
			$responseData = [
			    'status' => 'success',
			    'message' => 'Data saved successfully.',
			    'data' => [
			        'age' => $requestData["age"],
			        'name' => $requestData["name"],
			        'endpoint' => "http://localhost/test.php"
			    ]
			];
		}
		

		// Set the Content-Type header for JSON response
		header('Content-Type: application/json');

		// Convert the response data to JSON
		$jsonResponse = json_encode($responseData);

		// Send the response
		echo $jsonResponse;
		exit; // Terminate the script after sending the response
	}

	function invalid() {
		http_response_code(400); // Set the appropriate status code here

		// Create the response data
		$responseData = [
		    'status' => 'failed',
		    'message' => 'Invalid Request method.',
		];
		// Set the Content-Type header for JSON response
		header('Content-Type: application/json');

		// Convert the response data to JSON
		$jsonResponse = json_encode($responseData);
	}
	
		
}



?>