<?php 
$endPoint = "https://webapi.bps.go.id/v1/api/domain/type/prov/key/39a051f14955f95f7f6e6bd5ac425467/";
$params = [
    "action" => "data",
    "format" => "json"
];

$url = $endPoint . "?" . http_build_query( $params );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close( $ch );

$result2 = json_decode( $output, true );
?>