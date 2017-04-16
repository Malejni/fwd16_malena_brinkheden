<!-- config.php -->

<?php
$dbname = ‘u1164707_Malena’;
$hostname = ‘83.168.227.23’;
$username = ‘db1164707_Malena’;
$password = ‘pC3c)rw2Qi’;
$options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => “SET NAMES ‘UTF8’“);

try {
    $conn = new PDO(“mysql:host=$hostname;dbname=$dbname;“, $username,
    $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*** echo a message saying we have connected ***/
    //echo ‘Connected to database.<br />’;
}
catch(PDOException $e){
    // For debug purpose, shows all connection details
    echo ‘Connection failed: ’.$e->getMessage().“<br/>“;
      // Hide connection details.
    //echo ‘Could not connect to database.<br />’); 
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