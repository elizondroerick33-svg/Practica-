<?php

class Vehiculo {

    public static $tipo = "Vehículo";

    public static function mostrarTipo() {
        echo self::$tipo;
    }

    public static function mostrarClase() {
        echo __CLASS__;
    }
}

Vehiculo::mostrarTipo();

echo "<br>";

Vehiculo::mostrarClase();

?>