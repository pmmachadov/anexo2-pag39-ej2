<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>anexo2-pag39-ej2</title>
</head>
<body>
    <?php require_once './funlib.php'; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
"funlib.php" ?>">
        <fieldset>
     <!-- verdura con radio button -->

            <input type="radio" name="verdura[]" value="judias">
            <label for="judias">Judías</label><br>
            <input type="radio" name="verdura[]" value="garbanzos">
            <label for="garbanzos">Garbanzos</label><br>
            <input type="radio" name="verdura[]" value="lentejas">
            <label for="lentejas">Lentejas</label><br><br>

            <label for="cantidad">Cantidad en Kg. :</label>
            <input type="text" name="cantidad[]" min="0" max="100" value="0"><br><br>

            <label for="visa">Tarjeta VISA:</label>
            <input type="checkbox" name="visa">
            <br><br><br><br>
            <input type="submit" value="SUMAR DATOS" name="submit">
        </fieldset>
    </form>
</body>
</html>