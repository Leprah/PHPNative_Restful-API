<?php

$no=$_GET['no'];

$field= "";
$type="";
$deskripsi="";

// URL API
$url = 'http://192.168.56.23/sait_native/parameter'.'/'.$no;

if(isset($_POST["field"])){

    $client = curl_init();

    // get POST
    $field=$_POST['field'];
    $type=$_POST['type'];
    $deskripsi=$_POST['deskripsi'];

    $data = array("field"=>$field, "type"=>$type, "deskripsi"=>$deskripsi);
    $data = json_encode($data);
    $options = array(
        CURLOPT_URL				=> $url, // Set URL of API
        CURLOPT_CUSTOMREQUEST 	=> "PUT", // Set request method
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
    
    if($httpCode=="200"){ // if success
        echo "<div class='alert alert-success' style='width:300px;'> Berhasi Diubah </div>";
        header( "refresh:1;url=index.php");
    }else{ // if failed
        echo "<div class='alert alert-danger' style='width:300px;'>Terjadi Kesalahan<br/>".$response->error."</div>";
    }
}else{

    // Load Data
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

    $daftarBarang=null;
    if($httpCode=="200"){ // if success
        $data=json_decode($response);
        $field=$data->field;
        $type=$data->type;
        $deskripsi=$data->deskripsi;	
    }else{ // if failed
        $response=json_decode($response);
        echo "<div class='alert alert-danger' style='width:300px;'>Terjadi Kesalahan<br/>".$response->error."</div>";
    }
}
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <h1>Edit Parameter</h1>
		<br/>
		<div style="width:300px;">
            <div class="container">
                <form role="form" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Field</label>
                        <input type="text" name="field" placeholder="Parameter.." value='<?php echo $field ?>'/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" name="type" placeholder="Type.." value='<?php echo $type ?>'/>
                    </div>
                    <div class="input-group">
                        <label class="input-group-text">Deskripsi</label>
                        <input type="text" name="deskripsi" placeholder="deskripsi.." value='<?php echo $deskripsi ?>'/>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" value="Simpan">Submit</button>
                    <a class="btn btn-primary" href="index.php">Batal</a>
                </form>
            </div>
        </div>
    </body>
</html>