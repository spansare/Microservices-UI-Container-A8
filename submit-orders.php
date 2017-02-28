<?php
require_once("service-discovery.php");
$data = file_get_contents('php://input');
#$services = getenv("VCAP_SERVICES");
#$services_json = json_decode($services, true);

// Get the orders application url route from service discovery
//$ordersRoute = getAPIRoute("Orders-API");

#$application = getenv("sgroup_name");
#$application_json = json_decode($application, true);
#$applicationName = $application_json["name"];
#$ordersAppName = str_replace("ui-", "orders-api-", $applicationName);
#ordersAppName = str_replace("-ui", "-orders-api", $ordersAppName);
#$applicationURI = $application_json["application_uris"][0];
#$ordersHost = substr_replace($applicationURI, $ordersAppName, 0, strlen($applicationName));
#$ordersRoute = "http://" . $ordersHost;
#$ordersURL = $ordersRoute . "/rest/orders";

//$ordersURL = $ordersRoute . "/rest/orders";
//$ordersURL = "http://ms-ordersAPI-hyperfunctional-throstle.mybluemix.net/rest/orders";
$ordersURL = "http://localhost:6379/orders/JavaOrdersAPI/rest/orders";
error_log($ordersURL);

function httpPost($data,$url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, true);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$output = curl_exec ($ch);
	error_log($output);
	$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close ($ch);
	return $code;
}

echo json_encode(array("httpCode" => httpPost($data, $ordersURL), "ordersURL" => $ordersURL));

?>
