<?php
include_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para registro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" name="form" method="post">
        <h1>Registro de datos personales</h1>
        <div>
            <input type="number" name="dni" placeholder="D.N.I.">
        </div>
        <div>
            <input type="text" name="name" placeholder="Nombres y Apellidos">
        </div>
        <div>
            Fecha de nacimiento<input type="date" name="dob">
            Estado civil
            <select name="status" id="">
                <option value=""></option>
                <option value="soltero">Soltero</option>
                <option value="casado">Casado</option>
                <option value="separado">Separado</option>
                <option value="divorciado">Divorciado</option>
                <option value="viudo">Viudo</option>
            </select>
        </div>
        <div>
            <span>Sexo</span>
            <label>
                Masculino<input type="radio" name="gender" value="masculino">
            </label>
            <label>
                Femenino<input type="radio" name="gender" value="femenino">
            </label>
        </div>
        <div>
            <input type="text" name="address" id="address" placeholder="Calle y Número">
        </div>
        <div>
            <input type="text" name="town" id="town" placeholder="Ciudad">
        </div>
        <div>
            <input class="btn-primary" type="submit" name="register" value="Enviar">
            <input class="btn-secondary" type="reset" value="Restablecer">
        </div>
        <?php
        include('submit.php');
        ?>
    </form>
    <div>
        <form method="post">
            <input type="submit" name="query" value="Realizar consulta" class="btn-secondary">
            <?php
            if (isset($_POST['query'])) {
                header('Location: query.php');
            }
            ?>
            <a href="create_pdf.php" class="btn-primary">Descargar PDF</a>
        </form>
    </div>
    <div>
    </div>
</body>