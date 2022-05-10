<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'api');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$field = $_POST['field'];
$type = $_POST['type'];
$deskripsi = $_POST['deskripsi'];

$input = "INSERT INTO parameter set field='$field', type= '$type', deskripsi='$deskripsi'";

if(mysqli_query($link, $input)){
    echo "<h3>data stored in a database successfully </h3>"; 

} else{
    echo "ERROR: Hush! Sorry $input. " 
        . mysqli_error($link);
}
?>

<?php

$namaBarang="";
$kategori="";
$stok="";

if(isset($_POST["namaBarang"])){
    // URL API
    $url = 'http://localhost:8080/NativeREST/api/barang';
    $client = curl_init();

    // get POST
    $namaBarang=$_POST['namaBarang'];
    $kategori=$_POST['kategori'];
    $stok=$_POST['stok'];

    $data = array("namaBarang"=>$namaBarang, "kategori"=>$kategori, "stok"=>$stok);
    $data = json_encode($data);
    $options = array(
        CURLOPT_URL				=> $url, // Set URL of API
        CURLOPT_CUSTOMREQUEST 	=> "POST", // Set request method
        CURLOPT_RETURNTRANSFER	=> true, // true, to return the transfer as a string
        CURLOPT_POSTFIELDS 		=> $data, // Send the data in HTTP POST
        );

    curl_setopt_array( $client, $options );

    // Execute and Get the response
    $response = json_decode(curl_exec($client));
    // Get HTTP Code response
    $httpCode = curl_getinfo($client, CURLINFO_HTTP_CODE);
    // Close cURL session
    curl_close($client);
    if($httpCode=="201"){ // if success
        echo "<div class='alert alert-success' style='width:300px;'>Berhasi Disimpan</div>";
        header( "refresh:1;url=index.php");
    }else{ // if failed
        echo "<div class='alert alert-danger' style='width:300px;'>Terjadi Kesalahan<br/>".$response->error."</div>";
    }
}
?>