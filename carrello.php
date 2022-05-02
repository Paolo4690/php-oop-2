<?php
include_once __DIR__ . '/prodotti.php';

class Carrello{
    private $prodotti = [];
    public $totale; //da CAMBIARE

    public function aggiungiProdotto($_nome, $_prezzo, $_img){
        array_push($this->prodotti, new ProdottoGenerale($_nome, $_prezzo, $_img));
        $this->totale += $_prezzo;
    }
    public function setTotale($_prezzo){
        $this->totale += $_prezzo;
    }

    public function getTotale(){
        return $this->totale;
    }

    public function getProdotto(){
        return $this->prodotti;
    }
}

$carrello = new Carrello;
$carrello->aggiungiProdotto('peluche', 15.00, 'immagine_peluche');
$carrello->aggiungiProdotto('cuccia', 12.40, 'immagine_cuccia');
$carrello->aggiungiProdotto('Zero Pulci', 15.30, 'immagine Antipulci');
$carrello->aggiungiProdotto('pappa', 12.60, 'immagine pappa');

// var_dump($carrello);