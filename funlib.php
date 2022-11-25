<!-- Crear una página HTML con el siguiente formulario para tramitar las compras de
una frutería virtual.
El botón “ENVIAR DATOS” debe invocar la página “factura.php” que debe mostrar los
siguientes datos:
El cálculo del importe se hará en base a las siguientes reglas: El Kilo de Judías vale 2€,
el de garbanzos vale 2’5€, y el de lentejas vale 1’25€. Si la unidades es mayor de 10
kilos se aplica un descuento del 2%, y si es mayor de 50 Kilos se aplica un descuento
del 10%. Adicionalmente, si el pago se realiza con tarjeta VISA, se aplica un descuento
adicional del 5%. 
Convertir array a string si es necesario.
Guardar los datos en un array y sumarlos segun producto para mostrar precio  y unidades final
Mostrar en pantalla producto, unidades, visa si/no, importe.
-->

<?php
// Definir $verdura, que puede ser judias, garbanzos o lentejas.

// Declarar variables
$verdura = [];
$cantidad = [];
$visa = [];
$importe = 0;
$descuento = 0;
$descuento2 = 0;
$descuento3 = 0;

// Validar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") // Si se ha enviado el formulario
{
    // Validar verdura
    if (isset($_POST["verdura"])) {
        $verdura = $_POST["verdura"];
    } else {
        $verdura = [];
    }

    // Validar cantidad
    if (isset($_POST["cantidad"])) {
        $cantidad = $_POST["cantidad"];
    } else {
        $cantidad = [];
    }
  
    // Recoger datos del formulario
    $verdura = $_POST["verdura"];
    $cantidad = $_POST["cantidad"];
    $visa = $_POST["visa"] ?? "";
}

// Calcular importe
if (isset($verdura) && isset($cantidad)) {
    for ($i = 0; $i < count($verdura); $i++) {
        if ($verdura[$i] == "judias") {
            $importe += $cantidad[$i] * 2;
        } elseif ($verdura[$i] == "garbanzos") {
            $importe += $cantidad[$i] * 2.5;
        } elseif ($verdura[$i] == "lentejas") {
            $importe += $cantidad[$i] * 1.25;
        }
    }
}

// Calcular descuento
if (isset($cantidad)) {
    for ($i = 0; $i < count($cantidad); $i++) {
        if ($cantidad[$i] > 10) {
            $descuento = $importe * 0.02;
        } elseif ($cantidad[$i] > 50) {
            $descuento = $importe * 0.1;
        }
    }
}

// Calcular descuento2
if (isset($visa)) {
    if ($visa == true) {
        $descuento2 = $importe * 0.05;
    } else {
        $descuento2 = 0;
    }
}

// Calcular descuento3
$descuento3 = $descuento + $descuento2;

// Calcular importe final
$importeFinal = $importe - $descuento3;

// Mostrar datos
foreach ($verdura as $key => $value) {
    echo "Producto: " . $value . "<br>";
    echo "Unidades: " . $cantidad[$key] . "<br>";
  // Validar visa
  if (isset($_POST["visa"])) {
    $visa = $_POST["visa"];
    echo "VISA: SI" . "<br>";
} else {
    $visa = "";
    echo "VISA: NO" . "<br>";
}
    echo "Importe: " . $importeFinal . "<br>";
    
}
?>