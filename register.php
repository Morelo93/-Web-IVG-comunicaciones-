<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnRegistro'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $notificaciones = isset($_POST['cbx_notificaciones']) ? 1 : 0;
    $terminos = isset($_POST['cbx_terminos']) ? 1 : 0;

    // Verifica si el correo ya existe
    
    $sql = "SELECT * FROM users WHERE email_usu='$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "El correo ya está registrado.";
    } else {
        // Inserta el nuevo usuario
       
        $sql = "INSERT INTO users (nom_usu, email_usu, pass_usu, notifi_usu, termi_usu)
                VALUES ('$nombre', '$correo', '$password', '$notificaciones', '$terminos')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>