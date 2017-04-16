<!DOCTYPE html>
<html>
    <head>
        <meta charset=“UTF-8”>
        <title>MalenasDatabas</title>
    </head>
    <body>
        <?php
        // Call documents needed to run the program
        require (“config.php”);
        
       // Call store procedure and inputs an in parameter
        $sql = “CALL Account(‘Sohail’)“;
        $result = $conn->query($sql);
        
       // Fetches all rows with rowCount
        if ($result->rowCount()) {
            $result->setFetchMode(PDO::FETCH_CLASS, “bank”);
            // Prints the Firstname variable from the bank class
            while($row = $result->fetch()) {
                echo $row->Firstname;
            }
        }
        ?>
    </body>
</html>