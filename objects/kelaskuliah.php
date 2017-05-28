<?php
class KelasKuliah{

    // database connection and table keterangan
    private $conn;
    private $table_name = "kelas_kuliah";

    // object properties
    public $nrp;
    public $id_kelas;
    public $id_matkul;
    
    public function __construct($db){
        $this->conn = $db;
    }
    // create product
    function ambil(){


        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    nrp = ?, id_kelas = ?, id_matkul = ?";

        $stmt = $this->conn->prepare($query);

        // posted values
        $this->nrp=htmlspecialchars(strip_tags($this->nrp));
        $this->id_kelas=htmlspecialchars(strip_tags($this->id_kelas));
        $this->id_matkul=htmlspecialchars(strip_tags($this->id_matkul));
      

        // bind values
        $stmt->bindParam(1, $this->nrp);
        $stmt->bindParam(2, $this->id_kelas);
        $stmt->bindParam(3, $this->id_matkul);


        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
    function select($id_matkul,$id_kelas){

        $query = "SELECT *
        FROM
        " . $this->table_name . "
        WHERE
                    id_matkul = '" . $id_matkul . "' AND id_kelas = '" . $id_kelas . "'";


        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }

 }
 ?> 
