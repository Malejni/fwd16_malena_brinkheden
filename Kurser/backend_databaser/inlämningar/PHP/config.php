<!-- config.php -->

<?php
try {
    
   $conn = new PDO('mysql:host=83.168.227.23; dbname=db1164707_MalenaB', 'u1164707_MalenaB', 'pC3c)rw2Qi');
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    
   echo $e->getMessage();
    
   die();
    
}





?>