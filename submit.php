<?php
include('db.php');

if (isset($_POST['register'])) {
    
    $isDni = $_POST['dni'];
    $query = "SELECT * FROM users WHERE dni = '$isDni'";
    $check_result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($check_result) > 0) {
        
?>
        <h3 class="error">El DNI ya está registrado</h3>
<?php
    } else {
        
        if (
            strlen($_POST['dni']) === 8 &&
            strlen($_POST['name']) >= 1 &&
            strlen($_POST['dob']) >= 1 &&
            strlen($_POST['status']) >= 1 &&
            strlen($_POST['town']) >= 1 &&
            strlen($_POST['address']) >= 1
        ) {
            $dni = $_POST['dni'];
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $status = $_POST['status'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $town = $_POST['town'];

            $sql = "INSERT INTO users (dni, name, dob, status, gender, address, town) 
                VALUES ('$dni', '$name', '$dob', '$status', '$gender', '$address', '$town')";
            $query = mysqli_query($conexion, $sql);
            if ($query) {
?>
                <h3 class="success">REGISTRO COMPLETADO</h3>
<?php
            } else {
?>
                <h3 class="error">ERROR EN EL REGISTRO</h3>
<?php
            }
        } else if (strlen($_POST['dni']) !== 8) {
?>
            <h3 class="error">ERROR AL INGRESAR EL DNI</h3>
<?php
        } else {
?>
            <h3 class="error">DATOS POR COMPLETAR</h3>
<?php
        }
    }
}
?>

</body>