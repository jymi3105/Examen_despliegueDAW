<?php
$cuerpo='<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body>


    <div class="row">

        <div class="col s12  blue center-align card-panel teal lighten-2">
            <h4>Examen Despliegue </h4>
        </div>
        
        <div class="col s12  ">
            
            <p>Lo que vamos a realizar es una aplicacion en PHP, que realize lo siguiente:
            <ol>
            <li>Dado dos puntos calcular la distancia entre ellos. Esos puntos vendran marcados por su latitud y su longitud </li>
            <li>Una vez halla calculado la distancia quiero que me traduzca al ingles esa distancia.</li>
            </ol>
            </p>
            <p>
            Por ejemplo dadas las siguientes coordenadas:
            <ul>
            <li>(41.65518, -4.72372) corresponde a Valladolid </li>
            <li>(37.38283, -5.97317) corresponde a Sevilla </li>
            </ul>
            
            </p>
        
            
        </div>
        <aside>
                    <h5>Enlace Heroku </h5>
                    Pulsa sobre esta imagen para ver desplegada la aplicacion sobre heroku
                    <p>
                    <a title="Heroku" href=""><img src="imagenes/heroku.png" alt="Heroku" width="120" height="120" /></a>
                    </p>
        </aside>
        <form class="col s12" method = "POST">
            <div class="row">
                
                <div class="input-field col s2">
                    <label for="n_entero">Introduce la Latitud Punto 1:</label>
                    <input name="lat1" type="text" class="validate">
                    
                </div>
                <div class="input-field col s2">
                    <label for="n_entero">Introduce la Longitud  Punto 1:</label>
                    <input name="long1" type="text" class="validate">
                
                </div>
                <div class="input-field col s2">
                    <label for="n_entero">Introduce la Latitud Punto 2:</label>
                    <input name="lat2" type="text" class="validate">
                
                </div>
                <div class="input-field col s2">
                    <label for="n_entero">Introduce la Longitud  Punto 2:</label>
                    <input name="long2" type="text" class="validate">
                
                </div>
               

                <div class="row "></div> <!-- linea en blanco -->
                <div class="col s4">

                    <button class="btn waves-effect waves-light" type="submit" name="calcular">Calcular

                    </button>

                </div>
                
            </div>
        </form>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>';

//este rquire ponerle siempre es obligatorio
require __DIR__ . '/vendor/autoload.php';
use Ballen\Distical\Calculator as DistanceCalculator;
use Ballen\Distical\Entities\LatLong;

if (isset($_REQUEST['calcular'])) {
    $lat1 = $_REQUEST['lat1'];
    $long1 = $_REQUEST['long1'];
    $lat2 = $_REQUEST['lat2'];
    $long2 = $_REQUEST['long2'];

    
    $punto1 = new LatLong($lat1, $long1);
    $punto2 = new LatLong($lat2, $long2);
    $distancia = new DistanceCalculator($punto1, $punto2);

    // You can then compute the distance...
    $distance = $distancia->get();
    echo $cuerpo . '<br/>';
    echo $distance. '<br/>';
    // you can also chain these methods together eg. $distanceCalculator->get()->asMiles();
    
    // We can now output the miles using the asMiles() method, you can also calculate and use asKilometres() or asNauticalMiles() as required!
   echo 'La distanmcia en Millas entre el punto1 y el punto2 es de: ' . $distance->asMiles(). ' millas';
    
} else {
    
    echo $cuerpo;
}
