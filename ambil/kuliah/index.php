<?php
    include_once "../../cek_login.php";
?>
<div class="right-button-margin">
    <a href="../../logout.php" class="btn btn-default pull-right">Logout</a>
</div>
<?php

$page_title = "Integra";

include_once "../../header.php";
include_once '../../config/database.php';
include_once '../../objects/kelaskuliah.php';
include_once '../../objects/matakuliah.php';
include_once '../../objects/kelas.php';


$database = new Database();	
$db = $database->getConnection();
?>


<!--Area memproses POST form-->

<?php

// if the form was submitted
if($_POST){
  
   $kelaskuliah = new KelasKuliah($db);
   
   $kelaskuliah->nrp =$_POST['nrp'];
   $kelaskuliah->id_kelas=$_POST['id_kelas'];
   $kelaskuliah->id_matkul=$_POST['id_matkul'];
   if($kelaskuliah->ambil()){
       echo '<div class="alert alert-success alert-dismissable">';
           echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
           echo "Berhasil FRS.";
       echo "</div>";
   }

   // if unable to create the product, tell the user
   else{
       echo '<div class="alert alert-danger alert-dismissable">';
           echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
           echo 'Gagal FRS.';
       echo '</div>';
   }
  
}

?>

<!--Area Form-->
<form action="index.php" method="post">
   <table class="table table-hover table-responsive table-bordered">
       <tr>
           <td>NRP</td>
           <!-- value=<?php echo $_SESSION['admin_username']?> -->
           <td><input type="text" name="nrp" class="form-control" ></td>
       </tr>
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
               <button class="btn btn-primary" type="submit">FRS</button>
           </td>
       </tr>
   </table>
</form>


<?php
include_once "../../footer.php";
?>