<?php
require_once 'library/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Listado de Participantes</title>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}
th {
  border-bottom: 1px solid blue;
  border-top: 1px solid rgb(53, 108, 228);
  padding: 8px;
  text-align: left;
}
</style>
</head>
<body>
<h1>Listado de Participantes</h1>
<table>
<thead>
<tr>
<th>DNI</th>
<th>Apellidos y Nombres</th>
<th>Fecha de Nacimiento</th>
<th>Estado Civil</th>
<th>Sexo</th>
<th>Localidad</th>
</tr>
</thead>
<tbody>

<?php
include('db.php');
$sql = "SELECT * FROM users";
$result = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['dni'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['dob'] . '</td>';
    echo '<td>' . $row['status'] . '</td>';
    echo '<td>' . $row['gender'] . '</td>';
    echo '<td>' . $row['town'] . '</td>';
    echo '</tr>';
}
?>

</tbody>
</table>
</body>
</html>

<?php
$html = ob_get_clean();

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream("listado_participantes.pdf", array("Attachment" => false));
?>

