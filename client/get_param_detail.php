<?php
$no = $_GET['no'];

$url = 'http://192.168.56.23/sait_native/parameter'.'/'. $no;

$client = curl_init();

$options = array(
    CURLOPT_URL				=> $url, // Set URL of API
    CURLOPT_CUSTOMREQUEST 	=> "GET", // Set request method
    CURLOPT_RETURNTRANSFER	=> true, // true, to return the transfer as a string
);

curl_setopt_array( $client, $options );

// Execute and Get the response
$response = curl_exec($client);
// Get HTTP Code response
$httpCode = curl_getinfo($client, CURLINFO_HTTP_CODE);
// Close cURL session
curl_close($client);

//convert json to list
$result=null;
if($httpCode=="200"){ // if success
    $result=json_decode($response,1);
}else{ // if failedf
    $response=json_decode($response,1);
    echo "<div class='alert alert-danger' style='width:300px;'> Terjadi Kesalahan <br/>".$response->error."</div>";
}

$field = $result['field'];
$type = $result['type'];
$deskripsi = $result['deskripsi'];