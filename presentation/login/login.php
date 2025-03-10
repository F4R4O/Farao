<?php
session_start();
require_once '../../business/UsuarioService.php'; // Asegúrate de que la clase UserService está correctamente incluida

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //hay una solicitud de tipo POST, el usuario esta enviando datos
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);//$_POST['']=atrapa los datos que envia el usuario
    $userService = new UserService();
        //uso del authenticate para validar el login
        if ($userService->authenticate($email, $password)) {
            //$_SESSION crea una varibale de sesion asignando un valor al array $_SESSION
            $_SESSION['user'] = $email; //'user' es lo que guarda el valor, los nombres son separados por _
            /* $SESSION['nombre_usuario']="JESUS" */
            /* unset($_SESSION['']) --> SE USA PARA ELIMINAR VARIABLE DE SESION */
            /* unset() --> elimina todas las variables de sesion */
            /* Las variables de sesion usa cookis los cuales estan activas en los navegadores de no estarlo estas no funcionan */
            $_SESSION['nombre'] = 'Farao';
            
            header("Location: ../../presentation/dashboard/dashboard.php");
            exit();
        } else {
            $error = 'Usuario/Contraseña inválida.';
            /* session_destroy() cierra la session destruye la sesion activa */
            }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inicio de Sesión</title>
</head>
<body>
    <div class="container">
        <h1 class="title">INICIAR SESIÓN</h1>
        <h2 class="subtitle">SIS-FARAO</h2>
        <div class="form-container">
            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
            <form method="POST" action="">
                <label for="email">Usuario:</label>
                <input type="text" id="email" name="email" placeholder="Ingrese usuario" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingrese contraseña" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
