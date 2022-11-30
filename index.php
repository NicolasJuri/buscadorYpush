<?php

$servidor= "localhost";
  $usuario= "root";
  $password = "";
  $nombreBD= "buscador";
  $conexion = new mysqli($servidor, $usuario, $password, $nombreBD);
  if ($conexion->connect_error) {
      die("la conexión ha fallado: " . $conexion->connect_error);
  }


//contador

if ($_COOKIE["MIS_VISITAS"] != 'OK'){
    setcookie("MIS_VISITAS",'OK',time()+(60*60*24*365));

    $ip = $_SERVER['REMOTE_ADDR'];

    $query = 'INSERT INTO visitas (ip)
    VALUES (\''.$ip.'\')';
    mysqli_query($conexion,$query);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<script src="js/push.min.js"></script>
    <title>Contador de visitas</title>
</head>
<body>
    <?php
    
    $query =mysqli_query($conexion, "SELECT COUNT(*) AS 'total' FROM visitas");
    if ($row = mysqli_fetch_assoc($query)){}
    
    ?>



    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row-col-6" style="justify-content: center; margin: 0 auto;">
            <div class="card shadow-sm p-5">
                <div class="checkbox mb-3 text-center">
                    <p>
                      <?php echo $row["total"];?>  Visitas recibidas
                    </p>

                </div>

            </div>

            </div>

        </div>


    </div>


    <h2 class="display-3 text-center">Librerias Push</h2>

<script>
    
function push(){

Push.Permission.request();

Push.create('Hola mundo que tal?', {

body: 'Soy una notificación nueva',

icon: "img/logo.jpg",

timeout: 1500000,              

vibrate: [100, 100, 100],    

onClick: function() {

   

    window.location="https://google.es";



    console.log(this);

}  

});

}
    
</script>

<div class="carousel-caption text-start">

 <h1>Notificación PUSH</h1>

 <p>Presiona sobre el botón<p>

 <p><a class="btn btn-lg btn-primary" onclick="push();">Ejecutar</a></p>

 <div>

</body>
</html>