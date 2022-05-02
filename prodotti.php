<?php
include_once __DIR__ . '/prodottoGenerale.php';

class Alimento extends ProdottoGenerale 
{
    private $peso;
    private $tipo;
    
    function __construct(string $_nome, float $_prezzo, string $_img, float $_peso, string $_tipo){
        parent::__construct($_nome, $_prezzo, $_img);
        $this->peso = $_peso;
        $this->tipo = $_tipo;
    }

    public function setPeso($_peso) {
        $this->peso = $_peso;
        return $this;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setTipo($_tipo) {
        $this->tipo = $_tipo;
        return $this;
    }

    public function getTipo() {
        return $this->tipo;
    }
}

class Antipulci extends ProdottoGenerale
{
    private $razzaAnimale;
    private $disponibilità;
    
    function __construct(string $_nome, float $_prezzo, string $_img ,$_razzaAnimale , $_disponibilità){
        parent::__construct($_nome, $_prezzo, $_img);
        $this->razzaAnimale = $_razzaAnimale;
        $this->disponibilità = $_disponibilità;
    }

    public function setRazzaAnimale($_razzaAnimale) {
        $this->razzaAnimale = $_razzaAnimale;
    }

    public function getRazzaAnimale() {
        return $this->razzaAnimale;
    }

    public function setDisponibilità($_disponibilità) {
        $this->disponibilità = $_disponibilità;
    }

    public function getDisponibilità() {
        return $this->disponibilità;
    }
}

$zeroPulci= new Antipulci("Zero Pulci", 15.30, "immagine Antipulci","Labrador","Mese: aprile");
// var_dump($zeroPulci);

$croccantini= new Alimento ("pappa", 12.60, "immagine pappa", 3.50, "croccatini anallergici");
// var_dump($croccantini);