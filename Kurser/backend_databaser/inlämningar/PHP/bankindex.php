<!DOCTYPE html>
<html>
    <head>
        <meta charset=“UTF-8”>
        <title>MalenasDatabas</title>
    </head>
    <body>
        <?php
        
            include_once ('config.php');
        // Call documents needed to run the program
        
       // Call store procedure and inputs an in parameter
        $sql = "CALL Account(‘Sohail’)";
        $result = $conn->query($sql);
        
       // Fetches all rows with rowCount
        if ($result->rowCount()) {
            $result->setFetchMode(PDO::FETCH_CLASS, "bank");
            // Prints the Firstname variable from the bank class
            while($row = $result->fetch()) {
                echo $row->Firstname;
            }
        }
        
        class bank {
    //Class variables
    public $accountFirstname;
    public $accountLastname;
    public $accountName;
    private $accountBalance;
    public $Firstname;
    
   // Constructor who manages instances using data retrieved from DB
    public function __construct() {
        // Convert Float Value to an Integer
        $this->accountBalance = round($this->accountBalance);
        // Firstname gathers all necessary data from db and puts in a common variable
        $this->Firstname = “{$this->accountFirstname} {$this->accountLastname} has: {$this->accountName} with {$this->accountBalance} balance”;
    }
}
        ?>
    </body>
</html>