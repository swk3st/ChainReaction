<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
// header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

// Retrieve data from the request
$getdata = $_GET['str'];     // param sent from Angular is named 'str'


// Process data
// (this example simply extracts the data and restructures them back)

// Extract json format to PHP array
$request = json_decode($getdata);

$data = [];
foreach ($request as $k => $v)
{
  $data[0]['get_'.$k] = $v;
}
// response in php array


// Send response (in json format) back the front end
echo json_encode(['content'=>$data]);
?>


