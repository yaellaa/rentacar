<?php 
   include(ROOT_DIR."app/config/DatabaseConnect.php");
   $db = new DatabaseConnect();
   $conn = $db ->connectDB();

   $carList = [];
   try {
       $sql = "SELECT * FROM `cars`";
       $stmt = $conn ->prepare($sql);
       $stmt -> execute();
       $carList = $stmt -> fetchAll();
       

   } catch (PDOException $e){
      echo "Connection Failed: " . $e->getMessage();
      $db = null;
   }
?>