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

if ($conn === true) {
     echo "Connection was established";
     echo "<br>";

    $tsql = "SELECT TOP 1 frecuencia FROM [dbo].[raspberry]";
    $stmt = sqlsrv_query($conn, $tsql);
    if ($stmt === false) {
        echo "Error in query execution";
        echo "<br>";
        die(print_r(sqlsrv_errors(), true));
    }
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo $row['frecuencia'] . "<br/>" ;
    }
    sqlsrv_free_stmt($stmt);
    sqlsrv_close( $conn);
                break;
            }
?>