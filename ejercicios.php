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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); // The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script. So, the $_SERVER["PHP_SELF"] sends the submitted form data to the page itself, instead of jumping to a different page. This way, the user will get error messages on the same page as the form.
    "funlib.php" ?>">
        <fieldset>
            <input type="radio" name="verdura" value="judias">
            <label for="judias">Judías</label><br>
            <span class="error">
                <?php echo $verduraErr; ?>
            </span>
            <input type="radio" name="verdura" value="garbanzos">
            <label for="garbanzos">Garbanzos</label><br>
            <span class="error">
                <?php echo $verduraErr; ?>
            </span>
            <input type="radio" name="verdura" value="lentejas">
            <label for="lentejas">Lentejas</label><br><br>
            <span class="error">
                <?php echo $verduraErr; ?>
            </span>
            <label for="cantidad">Cantidad en Kg. :</label>
            <input type="text" name="cantidad" min="0" max="100" value="0"><br><br>
            <span class="error">*
                <?php echo $cantidadErr1; ?>
            </span>
            <span class="error">*
                <?php echo $cantidadErr2; ?>
            </span>
            <label for="visa">Tarjeta VISA:</label>
            <input type="checkbox" name="visa">
           <br>
            <input type="submit" value="SUMAR DATOS" name="submit">
        </fieldset>
    </form>
</body>

</html>