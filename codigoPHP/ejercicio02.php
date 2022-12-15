<?php
//@author Josue Martinez Fernandez
//@version 1.0
//ultima actualizacion 13/12/2022
//Comprobamos que el usuario introduzca los datos por primera vez
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Dominio Josue"');
    header('HTTP/1.0 401 Unauthorized');
//Si el usuario cancela...  
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="../webroot/css/style.css">
            <title>Ejercicio 02</title>
        </head>
        <body>
            <header>
                <h1>Tema 5</h1>
                <h2>Ejercicio 02</h2>
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
//Si ya ha enviado las credenciales, las comprobamos con la base de datos
} else {
//Importacion del fichero de conexion
//El fichero se selecciona en base al host en el que se ejecute el programa
    if ($_SERVER['HTTP_HOST'] == 'daw205.ieslossauces.es') {
        require_once '../conf/confConexionEE.php';
    } else if ($_SERVER['SERVER_ADDR'] == '192.168.3.212') {
        require_once '../conf/confConexionEDH.php';
    } else if ($_SERVER['SERVER_ADDR'] == '192.168.20.19') {
        require_once '../conf/confConexionED.php';
    }
//Define las instrucciones sql en variables    
    $codigoBuscaLogin = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario = :codUsuario AND T01_Password = :password;";
//Realizamos la conexion y ejecutamos la comprobacion en la BBDD
    try {
        $miDB = new PDO(HOSTPDO, USER, PASSWD);
        $passwordCifrada = (hash('sha256', ($_SERVER['PHP_AUTH_USER'] . $_SERVER['PHP_AUTH_PW'])));
        $buscaLogin = $miDB->prepare($codigoBuscaLogin);
        $buscaLogin->bindParam(':codUsuario', $_SERVER['PHP_AUTH_USER']);
        $buscaLogin->bindParam(':password', $passwordCifrada);
        $buscaLogin->execute();
        if ($buscaLogin->rowCount() == 0) {
            header('WWW-Authenticate: Basic realm="Dominio Josue"');
            header('HTTP/1.0 401 Unauthorized');
        } else {
//Si el usuario existe en la BBDD
            ?>
            <!DOCTYPE html>
            <html lang = "en">

                <head>
                    <meta charset = "UTF-8" />
                    <meta http-equiv = "X-UA-Compatible" content = "IE=edge" />
                    <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
                    <link rel = "stylesheet" href = "../webroot/css/style.css">
                    <title>Ejercicio 02</title>
                </head>
                <body>
                    <header>
                        <h1>Tema 5</h1>
                        <h2>Ejercicio 02</h2>
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
    } catch (Exception $e) {
//Si la conexion da error...
        ?>
        <!DOCTYPE html>
        <html lang="en">

            <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="stylesheet" href="../webroot/css/style.css">
                <title>Ejercicio 02</title>
            </head>
            <body>
                <header>
                    <h1>Tema 5</h1>
                    <h2>Ejercicio 02</h2>
                </header>
                <main>
                    <section>
                        <?php echo 'Error ' . $e->getCode() . ' : ' . $e->getMessage() . '<br>'; ?>  
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
        unset($miDB);
        exit();
    } finally {
        unset($miDB);
    }
}
?>