<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:iotedu.database.windows.net,1433; Database = pulsoCardiacodb", "CloudSA1ce0f26e", "{Cafu2025.}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "CloudSA1ce0f26e", "pwd" => "{Cafu2025.}", "Database" => "pulsoCardiacodb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:iotedu.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
//echo "Hola mundo";
//echo "<br>";
     //echo "Connection was established";
     //echo "<br>";

    $tsql = "SELECT TOP 1 frecuencia FROM [dbo].[ejemplo] ORDER BY id DESC";
    $stmt = sqlsrv_query($conn, $tsql);
    if ($stmt === false) {
        echo "Error in query execution";
        echo "<br>";
        die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
       $data = $row['frecuencia'];?>

 <link rel="stylesheet" href="css/bootstrap.min.css">
 <div class="mx-auto" style="width: 200px;">
    <div class="card text-center" style="width: 10rem;">
        <img class="card-img-top" src="corazon.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Frecuencia Cardiaca</h5>
            <p class="card-text"><?php echo number_format($data);?></p>
            
        </div>
        <a href="Ejemplo%20graficas/index.php"><button type="button" class="btn btn-secondary">Historial</button></a>
    </div>
    </div>
       <?php
        echo "<br>";
        if ($row['frecuencia']<60&&$row['frecuencia']>0) {
        ?>
      <div class="mx-auto" style="width: 300px;">
        <div class="alert alert-danger" role="alert" style="width: 18rem;">
            Alerta: 
        <?php echo " bradicardia" ;
            //include("enviarcorreo.php");
        ?>
        </div>
        </div>
       
        <?php  }
               if ($row['frecuencia']>100) {
                ?>
              <div class="mx-auto" style="width: 300px;">
                <div class="alert alert-danger" role="alert" style="width: 18rem;">
                    Alerta: 
                <?php echo " taquicardia" ;
                    //include("enviarcorreo.php");
                ?>
                </div>
                </div>
               
                <?php  }
                if ($row['frecuencia']==0) {
                    ?>
                  <div class="mx-auto" style="width: 300px;">
                    <div class="alert alert-danger" role="alert" style="width: 18rem;">
                        Alerta: 
                    <?php echo " PELIGRO" ;
                        //include("enviarcorreo.php");
                    ?>
                    </div>
                    </div>
                   
                    <?php  }
                if ($row['frecuencia']>=60&&$row['frecuencia']<=100) {
                    ?>
                  <div class="mx-auto" style="width: 300px;">
                   <div class="alert alert-success" role="alert">
                        Paciente estable 
                    </div>
                    </div>
                   
                    <?php  }
                
                
                
        sqlsrv_free_stmt($stmt);
        sqlsrv_close( $conn);
?>
