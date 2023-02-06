
<?php
$conexion = new mysqli('localhost', 'root', '', 'contador');
$result = $conexion->query("SELECT * FROM `counters`  WHERE id = 1");
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<span id="counter"><?php echo $data['counter']; ?></span>

<script type="text/javascript">
$(document).ready(function() {	
    function update(){
        var current = $('#counter').text();
        var sum = Number(current) + 3;
        var dataString = 'sum='+sum;
 
        $.ajax({
            type: "POST",
            url: "ejemplo2.php",
            data: dataString,
            success: function() {
                $('#counter').text(sum);
            }
        });
    }
 
    setInterval(update, 3000);
});
</script>