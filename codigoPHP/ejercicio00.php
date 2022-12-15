<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../webroot/css/style.css">
        <title>Ejercicio 00</title>
        <style>
            /*      
            Clase propia de phpinfo
            */
            .center {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>

    <body>
        <header>
            <h1>Tema 5</h1>
            <h2>Ejercicio 00</h2>
        </header>
        <main>
            <section>
                <?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 13/12/2022
//Importacion del fichero de conexion
//El fichero se selecciona en base al host en el que se ejecute el programa
                if ($_SERVER['HTTP_HOST'] == 'daw205.ieslossauces.es') {
                    require_once '../conf/confConexionEE.php';
                } else if ($_SERVER['SERVER_ADDR'] == '192.168.3.212') {
                    require_once '../conf/confConexionEDH.php';
                } else if ($_SERVER['SERVER_ADDR'] == '192.168.20.19') {
                    require_once '../conf/confConexionED.php';
                }
//Obtiene la clave del array y el dato almacenado en el mismo (SUPERGLOBALES)    
                echo '<h2>$_COOKIE</h2><table>';
                foreach ($_COOKIE as $campo => $valorCampo) {
                    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
                }
                echo '</table>';
                echo '<h2>$_ENV</h2><table>';
                foreach ($_ENV as $campo => $valorCampo) {
                    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
                }
                echo '</table>';
                echo '<h2>$_FILES</h2><table>';
                foreach ($_FILES as $campo => $valorCampo) {
                    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
                }
                echo '</table>';
                echo '<h2>$_GET</h2><table>';
                foreach ($_GET as $campo => $valorCampo) {
                    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
                }
                echo '</table>';
                echo '<h2>$_POST</h2><table>';
                foreach ($_POST as $campo => $valorCampo) {
                    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
                }
                echo '</table>';
                echo '<h2>$_REQUEST</h2><table>';
                foreach ($_REQUEST as $campo => $valorCampo) {
                    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
                }
                echo '</table>';
                echo '<h2>$_SERVER</h2><table>';
                foreach ($_SERVER as $campo => $valorCampo) {
                    echo '<tr><td>' . $campo . '</td><td>' . $valorCampo . '</td></tr>';
                }
                echo '</table>';
//Almacenar en el buffer la salida de phpinfo para poder a traves de 
//una expresion regular tan solo recoger la tabla (sin formato)    
                ob_start();
                phpinfo();
                $pinfo = ob_get_contents();
                ob_end_clean();
                $pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);
                echo $pinfo;
                ?>
            </section>
            <div class="return">
                <a href="../indexProyectoTema5.php"><img src="../webroot/images/back.png" alt="Imagen back"></a>
            </div>
        </main>
        <footer>
            <div class="footerIcons">
                <a href="../doc/curriculum.pdf" target="_blank"><img src="../webroot/images/curriculum.png"
                                                                     alt="Imagen curriculum"></a>
                <a href="https://github.com/JosueMarFer/205DWESProyectoTema5" target="_blank"><img
                        src="../webroot/images/github.png" alt="Imagen github"></a>
            </div>
            <div class="home">
                <a href="../../index.html"><img src="../webroot/images/home.png" alt="Imagen home"></a>
                <p>Josué martínez Fernández</p>
            </div>
        </footer>
    </body>
</html>