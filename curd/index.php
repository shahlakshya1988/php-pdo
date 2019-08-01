<?php 
try{
    require_once "pdo-connect.php";
}catch(Exception $e){
    $error = $e->getMessage();
    var_dump($error);
}
?>