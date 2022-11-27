<?php
// Definir $verdura, que puede ser judias, garbanzos o lentejas.

// Declarar variables
$verdura = 0;
$cantidad = 0;

// $visa puede ser SI o No.
$visa = "";
$importe = 0;
$total = 0;
$descuento = 0;
$descuento2 = 0;
$descuento3 = 0;

$verduraErr = "";
$cantidadErr1 = "";
$cantidadErr2 = "";

// Validar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") // Si se ha enviado el formulario
{
    // Validar verdura
    if (!isset($_POST["verdura"])) { // Si se ha seleccionado verdura
        echo $verduraErr = "No ha seleccionado ninguna verdura" . "<br>";
    } else {
        $verdura = $_POST["verdura"]; // Guardar verdura
    }

    // Validar cantidad
    $cantidad = $_POST["cantidad"]; // Guardar cantidad
    if (!isset($_POST["cantidad"])) { // Si se ha introducido cantidad
        echo $cantidadErr1 = "No ha introducido ninguna cantidad" . "<br>";
    } elseif (!is_numeric($cantidad) || ($cantidad <= 0)) {
        echo $cantidadErr2 = "La cantidad debe ser un número" . "<br>";
    } else {
        $cantidad = $_POST["cantidad"]; // Guardar cantidad
    }

    // Recoger datos del formulario
    $verdura = $_POST["verdura"] ?? ""; // Si no se ha seleccionado verdura, se asigna un valor vacío
    $cantidad = $_POST["cantidad"] ?? ""; // Si no se ha introducido cantidad, se asigna un valor vacío
    $visa = $_POST["visa"] ?? "NO"; // Si no se ha seleccionado visa, se asigna un valor NO


    // Calcular importe
    if (isset($verdura) && isset($cantidad)) {

        if ($verdura == "judias") {
            $importe = $cantidad * 1.5;
        } elseif ($verdura == "garbanzos") {
            $importe = $cantidad * 1.8;
        } elseif ($verdura == "lentejas") {
            $importe = $cantidad * 2;
        }

        // Calcular descuento
        if ($cantidad >= 10) {
            $descuento = $importe * 0.1;
        } elseif ($cantidad >= 20) {
            $descuento = $importe * 0.2;
        } elseif ($cantidad >= 30) {
            $descuento = $importe * 0.3;
        }

        // Calcular descuento2
        if ($visa == "on") {
            $descuento2 = $importe * 0.05;
        }

        // Calcular descuento3
        if (isset($verdura) && $cantidad >= 10) {
            $descuento3 = $importe * 0.05;
        }
        if ($cantidad >= 20) {
            $descuento3 = $importe * 0.05;
        }
        if ($cantidad >= 30) {
            $descuento3 = $importe * 0.05;
        }

        // Calcular total
        $total = $importe - $descuento - $descuento2 - $descuento3;



        // Mostrar datos
        if (isset($verdura) && isset($cantidad)) {

            echo "*********************" . "<br>";
            echo "FACTURA <br>";
            echo "Producto: " . $verdura . "<br>";
            echo "Unidades: " . $cantidad . "<br>";
            echo "Visa: " . $visa . "<br>";
            echo "Importe: " . $total . "<br>";
            echo "*********************";

        } else {
            echo "No se ha enviado el formulario porque no estaba completo";
        }
    }
}