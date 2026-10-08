<?php

final class Coche {

    public function getColor() {
        echo "Rojo";
    }
}

// No se puede heredar de una clase final.
class CocheDeLujo extends Coche {

}

?>