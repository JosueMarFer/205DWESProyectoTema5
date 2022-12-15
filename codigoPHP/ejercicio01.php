<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 13/12/2022
//Comprobamos que el usuario sea 'admin' y contraseña 'paso' con la autenticación del usuario.
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] != 'admin' || $_SERVER['PHP_AUTH_PW'] != 'paso') {
    header('WWW-Authenticate: Basic realm="Dominio Josue"');
    header('HTTP/1.0 401 Unauthorized');
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="../webroot/css/style.css">
            <title>Ejercicio 01</title>
        </head>

        <body>
            <header>
                <h1>Tema 5</h1>
                <h2>Ejercicio 01</h2>
            </header>
            <main>
                <section>
                    <h3>Se ha cancelado el inicio de sesión</h3>  
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
    <?php
    exit;
//Si el usuario esta bien autenticado muestra un mensaje.
} else {
    ?>
    <!DOCTYPE html>
    <html lang = "en">

        <head>
            <meta charset = "UTF-8" />
            <meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
            <link rel = "stylesheet" href = "../webroot/css/style.css">
            <title>Ejercicio 01</title>
        </head>
        <body>
            <header>
                <h1>Tema 5</h1>
                <h2>Ejercicio 01</h2>
            </header>
            <main>
                <section>
                    <h3>Usuario: <?php echo $_SERVER['PHP_AUTH_USER'] ?></h3>
                    <h3>Contraseña: <?php echo $_SERVER['PHP_AUTH_PW'] ?></h3>
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
    <?php
}
?>