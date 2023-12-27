<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  // try {
    
    $stmt = $conn->prepare("SELECT * FROM tbllogin WHERE username=:username AND password=:password");

   $stmt->execute([
      ':username' => $_POST['username'],
      ':password' => $_POST['password']
    ]);

  //   $results['users'] = $stmt->fetchAll(PDO::FETCH_OBJ);
    
  //   echo json_encode($results);
  // } catch (PDOException $e){
  //   var_dump($e);
  // }
    $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
  try {
 
    // $stmt=$conn->query("SELECT * FROM tbllogin where login.username = '{$_POST['username']}' and password='{$_POST['password']}'")->fetch(PDO::FETCH_ASSOC);
    
//   echo json_encode($user);
    if($user){
       
        $results['auth']='passed';
        $results['user']=$user;
      
    }
    else
    $results['auth']='failed';
    
   
    
    echo json_encode($results);
} catch (PDOException $e){
    var_dump($e);
}
}
?>