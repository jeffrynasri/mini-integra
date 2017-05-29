

   


<?php
    // include_once "cek_login.php";
?>
<?php

$page_title = "Integra";
include_once "../header.php";
include_once '../config/database.php';
include_once '../objects/kelaskuliah.php';
include_once '../objects/matakuliah.php';
include_once '../objects/kelas.php';



$database = new Database(); 
$db = $database->getConnection();
?>


<!--Area memproses POST form-->

<?php


    //echo $_SERVER['SERVER_NAME'];
    echo $_SERVER['REQUEST_URI'];
// if the form was submitted
if($_GET){
  
   $kelaskuliah = new KelasKuliah($db);
   $stmt=$kelaskuliah->select($_GET['id_matkul'],$_GET['id_kelas']);
  
   echo '<table class="table table-hover table-responsive table-bordered" id="c">';
    echo '  <tr>';
    echo '      <th>NRP</th>';
    echo '      <th>ID MATKUL</th>';
    echo '      <th>ID KELAS</th>';
    echo '  </tr>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        echo '  <td>'.$nrp.'</td>';
        echo '  <td>'.$id_matkul.'</td>';
        echo '  <td>'.$id_kelas.'</td>';
        echo '</tr>';
    }

    echo '</table>';
}

?>

<!--Area Form-->
<form action="index.php" method="get">
   <table class="table table-hover table-responsive table-bordered">
       <tr>
           <td>KELAS</td>
           <td>
           <?php

                $manajer = new Kelas($db);
                $stmt = $manajer->selectAll();
                
                // put them in a select drop-down
                echo "<select class='form-control' name='id_kelas'>";

                    echo "<option>Silakan Pilih...</option>";
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        
                        echo "<option value='$id_kelas'>";
                        echo "$nama_kelas</option>";
                    }
                echo "</select>";
            ?>
           </td>
       </tr>
       <tr>
           <td>MATKUL</td>
           <td>
           <?php

                $manajer = new MataKuliah($db);
                $stmt = $manajer->selectAll();
                
                // put them in a select drop-down
                echo "<select class='form-control' name='id_matkul'>";

                    echo "<option>Silakan Pilih...</option>";
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        
                        echo "<option value='$id_matkul'>";
                        echo "$nama_matkul</option>";
                    }
                echo "</select>";
            ?>
           </td>
       </tr>
       <tr>
           <td></td>
           <td>
               <button class="btn btn-primary" type="submit">TAMPIL</button>
           </td>
       </tr>
   </table>
</form>


<?php
include_once "../footer.php";
?>