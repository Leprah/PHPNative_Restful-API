<?php

$field='';
$type='';
$deskripsi='';

if(isset($_POST["field"])){
	// URL API
	$url = 'http://192.168.56.23/sait_native/parameter';
	$client = curl_init();

	// get POST
	$field=$_POST['field'];
	$type=$_POST['type'];
	$deskripsi=$_POST['deskripsi'];

	$data = array("field"=>$field, "type"=>$type, "deskripsi"=>$deskripsi);
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
		echo "<div class='alert alert-success' style='width:300px;'>Data berhasi dikirim ke API! </div>";
		header( "refresh:1;url=index.php");
	}else{ // if failed
		echo "<div class='alert alert-danger' style='width:300px;'>Terjadi Kesalahan<br/>".$response->error."</div>";

	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sample Client App</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<br/>
		<h1>Tambah Parameter</h1>
		<br/>
		<div style="width: 400px;">
			<form role="form" method="POST">
				<div class="form-group">
					<label>Field :</label>
					<input type="text" class="form-control" name="field" value='<?php echo $field; ?>'>
				</div>
				<div class="form-group">
					<label>Type :</label>
					<input type="text" class="form-control" name="type" value='<?php echo $type; ?>'>
				</div>
				<div class="form-group">
					<label>Deskripsi :</label>
					<input type="text" class="form-control" name="deskripsi" value='<?php echo $deskripsi; ?>'>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Simpan">
					<a class="btn btn-default" href="index.php">Batal</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
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

if(isset($_POST["field"])){
	$field = $_POST['field'];
	$type = $_POST['type'];
	$deskripsi = $_POST['deskripsi'];

	$input = "INSERT INTO parameter set field='$field', type= '$type', deskripsi='$deskripsi'";

	if(mysqli_query($link, $input)){
		echo "<div class='alert alert-success' style='width:300px;'> Data berhasi disimpan di local! </div>"; 

	} else{
		echo "ERROR: Hush! Sorry $input. " 
			. mysqli_error($link);
	}
}
?>