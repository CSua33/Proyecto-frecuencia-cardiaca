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

    $tsql = "SELECT TOP 1 frecuencia FROM [dbo].[raspberry] ORDER BY id DESC";
    $stmt = sqlsrv_query($conn, $tsql);
    if ($stmt === false) {
        echo "Error in query execution";
        echo "<br>";
        die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
       $data = $row['frecuencia'];?>

 <link rel="stylesheet" href="css/bootstrap.min.css">

    <div class="card text-center" style="width: 10rem;">
        <img class="card-img-top" src="corazon.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Frecuencia Cardiaca</h5>
            <p class="card-text"><?php echo $data;?></p>
            
        </div>
        <button type="button" class="btn btn-secondary">Historial</button>
    </div>

       <?php
        echo "<br>";
        if ($row['frecuencia']<45) {
        ?>
      
        <div class="alert alert-danger" role="alert" style="width: 18rem;">
            Alerta: 
        <?php echo "La persona se muere" ;
            //include("enviarcorreo.php");
        ?>
        
        </div>
       
        <?php  }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close( $conn);
?>
