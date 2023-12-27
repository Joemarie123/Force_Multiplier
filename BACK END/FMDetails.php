<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $queryString = "";
        // $controlno = isset($_POST['Controlno']) ? $_POST['Controlno'] : false;
        $dataArguments = [
            ':Controlno' => $_POST['Controlno'],
            // ':association' => $_POST['association'],
            // ':fullname' => $_POST['fullname'],
            // ':barangay' => $_POST['barangay'],
            // ':contactno' => $_POST['contactno'],
            // ':plateno' => $_POST['placteno'],
            // ':cityplateno' => $_POST['cityplateno'],


        ];
        $dataArguments2 = [
            ':Controlno' => $_POST['Controlno'],
      


        ];
        // if($controlno){


        //     $queryString = "UPDATE tblpersonal set association=:association,fullname=:fullname,barangay=:barangay,contactno=:contactno,plateno=:plateno,cityplateno=:cityplateno where controlno=:Controlno";


        // }
        // else{
        //     $queryString = "INSERT INTO tblpersonal(Controlno,association,fullname,barangay,contactno,plateno,cityplateno) VALUES (:Controlno,:association,:fullname,:barangay,:contactno,:plateno, :cityplateno)";

        // }
        $queryString = "SELECT Controlno,association,lastname,firstname,middlename,barangay,contactno,plateno,cityplateno from tblpersonal where controlno=:Controlno";
        $stmt = $conn->prepare($queryString);
        $stmt->execute($dataArguments);
        $results['user'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $stmt->close();
        $queryString2 = "SELECT pic,license from tblpersonal where controlno=:Controlno";
        $stmt2 = $conn->prepare($queryString2);
        $stmt2->execute($dataArguments2);
        $pics=$stmt2->fetch(PDO::FETCH_ASSOC);
        if($pics){
            
            $picdata=$pics['pic'];
            $piclicense=$pics['license'];
        }else{
            $picdata = '';
            $piclicense = '';
        }
        $stmt2->closeCursor();
        // $queryresult = $stmt2->get_result();
        // $pics=$queryresult->fetch_array();
        // $picdata = $pics['pic'];// Use square brackets to access array elements
        // $piclicense = $pics['license'];
        // if (!empty($results)) {
        //     echo"nisulod!";
        //     foreach ($queryresults as $row) {
                
        //         $picdata = $row['pic'];
        //         $piclicense = $row['license'];
        
        //         // Process or use $picdata and $piclicense as needed for each row
        //     }
        // } else {
        //     // Handle the case where no rows were found
        //     echo " dirinisulod!";
        //     $picdata = '';
        //     $piclicense = '';
        // }
        // if (empty($picData)) {

        //     echo"hereemt";
        //     $picData = '';
        // }
        // if (empty($piclicense)) {
        //     echo"here2empty";
        //     $piclicense = '';
        // }

        $targetfile = 'C:\\xampp\\htdocs\\FORCEMULTIPLIER\\img\\' . $_POST['Controlno'] . '1.jpg';
        $targetfile2 = 'C:\\xampp\\htdocs\\FORCEMULTIPLIER\\img\\' . $_POST['Controlno'] . '2.jpg';
        if(file_exists($targetfile)){
            unlink($targetfile);
        }
        if(file_exists($targetfile2)){
            unlink($targetfile2);
        }

        if ($picdata) {
            
            file_put_contents($targetfile, $picdata);
        }
        if ($piclicense) {
            
            file_put_contents($targetfile2, $piclicense);
        }
        // echo "SUCCESSFULLY SAVED!";
        echo json_encode($results);
    } catch (PDOException $e) {
        var_dump($e);
    }

}
?>