<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para registro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" name="form" method="post">
        <h1>Búsqueda de datos personales</h1>
        <div>
            <span>Ingrese el DNI</span>
            <input type="number" name="dni" placeholder="D.N.I.">
        </div>
        <div>
            <input class="btn-primary" type="submit" value="Buscar" name="query">
        </div>
        <?php
        $inc = include("db.php");
        if (isset($_POST['query'])) {
            $id = $_POST['dni'];
            if ($inc) {
                $sql = "SELECT * FROM users WHERE dni = $id";
                $res = mysqli_query($conexion, $sql);
                if ($res) { // Verifica si la consulta se ejecutó correctamente
                    if (mysqli_num_rows($res) > 0) { // Verifica si se encontraron resultados
                        while ($row = mysqli_fetch_assoc($res)) {
                            $dni = $row['dni'];
                            $name = $row['name'];
                            $dob = $row['dob'];
                            $status = $row['status'];
                            $gender = $row['gender'];
                            $address = $row['address'];
                            $town = $row['town'];
        ?>
                            <table style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Nombre y Apellido</th>
                                        <th scope="col">Fecha de nacimiento</th>
                                        <th scope="col">Estado civil</th>
                                        <th scope="col">Sexo</th>
                                        <th scope="col">Domicilio</th>
                                        <th scope="col">Localidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $dni ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $dob ?></td>
                                        <td><?php echo $status ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $town ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php
                        }
                    } else {
                        ?>
                        <h3 class="error">Registro inexistente </h3>
        <?php
                    }
                } else {
                    // Manejo de errores si la consulta no se ejecuta correctamente
                    echo "Error en la consulta: " . mysqli_error($conexion);
                }
            }
        }
        ?>
        <div>
            <form method="post">
                <input type="submit" name="submit" value="Realizar registro" class="btn-secondary">
                <?php
                if (isset($_POST['submit'])) {
                    header('Location: index.php');
                }
                ?>
            </form>
        </div>
    </form>
</body>