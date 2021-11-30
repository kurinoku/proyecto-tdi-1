<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Administrador</title>
</head>
<body class="text-center">
    
    <div class="container">
        <div class="row"><a href="index.php">&lt;&lt; Volver a pagina principal</a></div>
        <div class="row">
            <?php
            require('Mantenedores/conexion_p.php');
            session_start();
            if (isset($_POST['admin'])){

                $username = stripslashes($_REQUEST['admin']); // removes backslashes
                $username = mysqli_real_escape_string($conexion,$username); //escapes special characters in a string
                $password = md5($_REQUEST['clave']);
                $password = mysqli_real_escape_string($conexion,$password);
                
                //Checking is user existing in the database or not
                $query = "SELECT * FROM administrador WHERE Rut_administrador='$username' and Clave_administrador='$password'";
                $result = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
                $rows = mysqli_num_rows($result);
                if($rows==1){
                    $_SESSION['admin'] = $username;
                    header("Location: Mantenedores/index_administrador.php"); // Redirect user to index.php
                }else{
                    echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='login_administrador.php'>Logearte</a></div>";
                }
            }else{
                ?>
                <form method="POST" action="" class="form-signin">
                    <h1 class="h3 mb-3 font-weight-normal">Identificación de administrador</h1>
                    <input id="usuarioInput" type="text" placeholder="Rut: XX XXX XX" name="admin"  class="form-control" required autofocus>
                    <input id="claveInput" type="password" placeholder="Contraseña" name="clave" class="form-control" required autofocus>
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                    </div>
                    <input type="hidden" name="adminLogin" value="1" />
                </form>
                <?php
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>