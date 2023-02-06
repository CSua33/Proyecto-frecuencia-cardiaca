<!DOCTYPE HTML>
<html>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <head>
        <title></title>
    <script
        src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    </head>
<body>
    <div id="seccionRecargar"></div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        setInterval(
            function(){
                $('#seccionRecargar').load('ejemplo2.php');
            },2000
        );
    });
</script>