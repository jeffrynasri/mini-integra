<?php
class Mahasiswa{

    // database connection and table nama
    private $conn;
    private $table_name = "mahasiswa";

    // object properties
    public $nrp;
    public $nama;
    public $password;
    

    public function __construct($db){
        $this->conn = $db;
    }
    function login($nrp,$password){

        //write query
        $query = "SELECT * FROM
                    " . $this->table_name . "
                WHERE
                    nrp = '" . $nrp . "' AND password = '" . $password . "'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        // print_r($stmt);
        $ada =0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $ada++;
        }
        
        if($stmt->execute() && $ada>0){
            return true;
        }else{
            return false;
        }

    }
}
?>