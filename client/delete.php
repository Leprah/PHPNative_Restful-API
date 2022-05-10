
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Native restfull api</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>
	<div class="container">
		<br/>
		<?php

		$no = $_GET['no']; // item id that will delete
		// URL API
		$url = 'http://192.168.56.23/sait_native/parameter'.'/'.$no;

		$client = curl_init();

		$options = array(
		    CURLOPT_URL				=> $url, // Set URL of API
		    CURLOPT_CUSTOMREQUEST 	=> "DELETE", // Set request method
		    CURLOPT_RETURNTRANSFER	=> true, // true, to return the transfer as a string
		    );

		curl_setopt_array( $client, $options );

		// Execute and Get the response
		$response = json_decode(curl_exec($client));
		// Get HTTP Code response
		$httpCode = curl_getinfo($client, CURLINFO_HTTP_CODE);
		// Close cURL session
		curl_close($client);

		if($httpCode=="200"){ // if success
			echo "<div class='alert alert-success' style='width:300px;'>Berhasi Dihapus</div>";
			header( "refresh:1;url=index.php");
		}else{ // if failed
			echo "<div class='alert alert-danger' style='width:300px;'>Terjadi Kesalahan<br/>".$response->error."</div>";
			echo "<a class='btn btn-default' href='index.php'>Back</a>";
		}
		
		?>

	</div>

</body>
</html>