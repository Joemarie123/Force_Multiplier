<?php
require "db.php";
$results = [];
$dupli = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $queryString = "";
        $controlno = isset($_POST['Controlno']) ? $_POST['Controlno'] : false;
        if ($_FILES['picdata']['tmp_name'] != '') {
            $PicData = file_get_contents($_FILES['picdata']['tmp_name']);
        } else {
            $PicData = '';
        }
        if ($_FILES['piclicense']['tmp_name'] != '') {
            $PicLicense = file_get_contents($_FILES['piclicense']['tmp_name']);
        } else {
            $PicLicense = '';
        }




        if ($controlno) {
            $dataArguments = [
                ':Controlno' => $_POST['Controlno'],

                ':lastname' => $_POST['lastname'],
                ':firstname' => $_POST['firstname'],
                ':middlename' => $_POST['middlename'],

            ];

            $stmt = $conn->prepare("SELECT * from tblpersonal where lastname=:lastname and firstname=:firstname and middlename=:middlename and controlno<>:Controlno");
            $stmt->execute($dataArguments);
            $duplicate = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($duplicate) {
                $results['message'] = "duplicate";
                $dupli = 1;
            } else {
                $dataArguments = [
                    ':Controlno' => $_POST['Controlno'],
                    ':association' => $_POST['association'],
                    ':lastname' => $_POST['lastname'],
                    ':firstname' => $_POST['firstname'],
                    ':middlename' => $_POST['middlename'],
                    ':barangay' => $_POST['barangay'],
                    ':contactno' => $_POST['contactno'],
                    ':plateno' => $_POST['plateno'],
                    ':cityplateno' => $_POST['cityplateno'],

                ];
                $queryString = "UPDATE tblpersonal set association=:association,lastname=:lastname,firstname=:firstname,middlename=:middlename,barangay=:barangay,contactno=:contactno,plateno=:plateno,cityplateno=:cityplateno where controlno=:Controlno";
            }



        } else {

            $dataArguments = [


                ':lastname' => $_POST['lastname'],
                ':firstname' => $_POST['firstname'],
                ':middlename' => $_POST['middlename'],

            ];

            $stmt = $conn->prepare("SELECT * from tblpersonal where lastname=:lastname and firstname=:firstname and middlename=:middlename");
            $stmt->execute($dataArguments);
            $duplicate = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($duplicate) {
                $results['message'] = "duplicate";
                $dupli = 1;
            } else {

                $combination = date("ym");
                $query = $conn->query("select right(controlno,4) as cont from tblpersonal where left(controlno,4)='{$combination}' order by id desc")->fetch(PDO::FETCH_ASSOC);
                if ($query) {
                    // echo "query=" . $query['cont'] + 1;
                    $generate = str_pad($query['cont'] + 1, 4, '0', STR_PAD_LEFT);
                } else {
                    $generate = '0001';
                }
                $controlnumber = $combination . '-' . $generate;
                $dataArguments = [
                    ':Controlno' => $controlnumber,
                    ':association' => $_POST['association'],
                    ':lastname' => $_POST['lastname'],
                    ':firstname' => $_POST['firstname'],
                    ':middlename' => $_POST['middlename'],
                    ':barangay' => $_POST['barangay'],
                    ':contactno' => $_POST['contactno'],
                    ':plateno' => $_POST['plateno'],
                    ':cityplateno' => $_POST['cityplateno'],
                    ':picdata' => $PicData,
                    ':piclicense' => $PicLicense

                ];
                $queryString = "INSERT INTO tblpersonal(Controlno,association,lastname,firstname,middlename,barangay,contactno,plateno,cityplateno,pic,license) VALUES (:Controlno,:association,:lastname,:firstname,:middlename,:barangay,:contactno,:plateno, :cityplateno,:picdata,:piclicense)";
            }

        }

        if ($dupli == 0) {
            $stmt = $conn->prepare($queryString);
            $stmt->execute($dataArguments);

            $results['message'] = "success";

        }
        echo json_encode($results);
        // echo  json_encode( $dataArguments);
    } catch (PDOException $e) {
        var_dump($e);
    }

}
?>