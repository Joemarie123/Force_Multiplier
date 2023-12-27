<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    try {
    //     $queryString = "";
    // // $controlno = isset($_POST['Controlno']) ? $_POST['Controlno'] : false;
    // $dataArguments = [
    //     ':Controlno' => $_POST['Controlno'],
    //     // ':association' => $_POST['association'],
    //     // ':fullname' => $_POST['fullname'],
    //     // ':barangay' => $_POST['barangay'],
    //     // ':contactno' => $_POST['contactno'],
    //     // ':plateno' => $_POST['placteno'],
    //     // ':cityplateno' => $_POST['cityplateno'],
        
        
    // ];
    // if($controlno){
    
   
    //     $queryString = "UPDATE tblpersonal set association=:association,fullname=:fullname,barangay=:barangay,contactno=:contactno,plateno=:plateno,cityplateno=:cityplateno where controlno=:Controlno";
   
        
    // }
    // else{
    //     $queryString = "INSERT INTO tblpersonal(Controlno,association,fullname,barangay,contactno,plateno,cityplateno) VALUES (:Controlno,:association,:fullname,:barangay,:contactno,:plateno, :cityplateno)";

       // }
       $queryString="SELECT controlno,association,CONCAT(firstname, ' ', middlename, ' ', lastname) as fullname,barangay,contactno,plateno,cityplateno from tblpersonal";
    $stmt = $conn->prepare($queryString);
    $stmt->execute();
        $results['users']=$stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo "SUCCESSFULLY SAVED!";
    echo  json_encode( $results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>