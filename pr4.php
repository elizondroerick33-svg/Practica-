<?php

class Circulo {

    private $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return pi() * pow($this->radio, 2);
    }

    public function calcularPerimetro() {
        return 2 * pi() * $this->radio;
    }
}

$circulo = new Circulo(5);

echo "Área: " . $circulo->calcularArea();
echo "<br>";
echo "Perímetro: " . $circulo->calcularPerimetro();

?>