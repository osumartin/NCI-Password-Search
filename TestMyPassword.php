<?php

class TestMyPassword {
    private $inputPWD;
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

//set the values to connect to the database
    function __construct(){
        $this->servername = "localhost";
        $this->username = "martin";
	$this->password = "MouseCatDog";
	$this->dbname = "PASSWORDS";
    }
    // Create connection

    public function connect_to_database(){
	$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    } // End connect_to_database


    public function getPWD(){
        return $this->inputPWD;
    }

    public function setPWD($newval){
//This is where the user provided data is escaped, to stop sql injection
	$this->inputPWD = $this->conn->real_escape_string($newval);
    }
    
    function get_hack_details(){
        $query_1 = "SELECT Hack_ID FROM Hacked_Passwords WHERE Password = BINARY '$this->inputPWD';";
        $query_2 = "SELECT ID,Hack_Date,Hack_Discription,Hack_URI FROM Hack_Details WHERE ";
	$result = $this->conn->query($query_1);
	$tmp ="";
	$hack_details = array();
	if ($result->num_rows >0){
            while($row = $result->fetch_assoc()) {
                if ($tmp ==""){
                    $tmp = "ID=".$row["Hack_ID"];
                } else {
                    $tmp = $tmp." OR ID=".$row["Hack_ID"];
                }
            } // end while
            $query_2 = $query_2.$tmp;
	    $result_2 = $this->conn->query($query_2);

            while($row = $result_2->fetch_assoc()) {
                $tmp_arr = array($row["ID"],$row["Hack_Date"],$row["Hack_Discription"],$row["Hack_URI"]);
                array_push($hack_details,$tmp_arr);
            } // end while

	} else {} // NO PASSWORD FOUND SO TELL THE USER
	return $hack_details;
    } // end get_hack_details

} // End TestMyPassword

?>
