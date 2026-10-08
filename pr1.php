<?php

class Coche {
    protected $color;

    public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    public function mostrarCaracteristicas() {
        echo "Color: " . $this->getColor();
    }
}

$miCoche = new Coche();

$miCoche->setColor("Rojo");
$miCoche->mostrarCaracteristicas();

?>