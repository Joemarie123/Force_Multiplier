<?php
require "db.php";
$results = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $queryString = "";

        if ($_FILES['picdata']['tmp_name']) {
            
            $Picdata = file_get_contents($_FILES['picdata']['tmp_name']);
        } else {
            $Picdata = '';
        }
        if ($_FILES['piclicense']['tmp_name']) {
            
            $PicLicense = file_get_contents($_FILES['piclicense']['tmp_name']);
        } else {
            $PicLicense = '';
        }


        
        if ($Picdata != '') {
            
            $queryString = "UPDATE tblpersonal set pic=:picdata where controlno=:Controlno";



            $dataArguments = [
                ':Controlno' => $_POST['Controlno'],

                ':picdata' => $Picdata


            ];
        } else {
            $queryString = "UPDATE tblpersonal set license=:piclicense where controlno=:Controlno";



            $dataArguments = [
                ':Controlno' => $_POST['Controlno'],


                ':piclicense' => $PicLicense

            ];

        }
        $stmt = $conn->prepare($queryString);
        $stmt->execute($dataArguments);

        echo "SUCCESSFULLY SAVED!";
        // echo  json_encode( $dataArguments);
    } catch (PDOException $e) {
        var_dump($e);
    }

}
?>