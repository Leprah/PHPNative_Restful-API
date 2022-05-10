<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Search Domain Data </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
    <div class="mt-5 mb-3 clearfix">
        <h2> Search Domain Data </h2>
    </div>
    <label for="basic-url">Your vanity URL</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">https://webapi.bps.go.id/v1/api/domain/</span>
        </div>
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
    </div>
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="create_form.php" class="btn btn-success pull-right "><i class="fa fa-plus"></i> Add parameter </a>
                    <br>
                    <div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Field</th>
                                    <th>Type</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            require 'get_parameter.php';
                            foreach($result as $key){
                                echo "<tr>";
                                    echo "<td>" . $key['no'] . "</td>";
                                    echo "<td>" . $key['field'] . "</td>";
                                    echo "<td>" . $key['type'] . "</td>";
                                    echo "<td>" . $key['deskripsi'] . "</td>";
                                    echo "<td>";
                                        echo '<a href="update_form.php?no='.$key['no'] .'" method="GET" title="Update Record"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="delete.php?no='.$key['no'] .'" method="GET" title="Delete Data" ><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                echo "</tr>";
                                }?>
                            </tbody>                     
                        </table>
                    </div>
                    <hr>
                    <h2> Response </h2>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Domain</th>
                                <th>Nama Daerah</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        require 'get_domain.php';
                        $no = 1;
                        $result2 = $result2["data"][1];
                        foreach($result2 as $value){
                            echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $value['domain_id'] . "</td>";
                                echo "<td>" . $value['domain_name'] . "</td>";
                                echo "<td>" . $value['domain_url'] . "</td>";
                            echo "</tr>";
                        }?>
                        </tbody>                           
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>