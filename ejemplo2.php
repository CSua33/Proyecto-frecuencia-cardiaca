<?php
// PHP Data Objects(PDO) Sample Code:
$sum = $_POST['sum'];
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
     echo "Connection was established";
     echo "<br>";
    $tsql = "UPDATE [dbo].[raspberry] SET frecuencia = ".$sum." ";
    $stmt = sqlsrv_query($conn, $tsql);
    if ($stmt === false) {
        echo "Error in query execution";
        echo "<br>";
        die(print_r(sqlsrv_errors(), true));
    }
?>

<?php
    sqlsrv_free_stmt($stmt);
    sqlsrv_close( $conn);
                
            
?>