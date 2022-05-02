<?php
include_once __DIR__ . '/prodotti.php';

class Carrello{
    public $prodotti = [];
    public $totale;

    public function aggiungiProdotto($_nome, $_prezzo, $_img){
        array_push($this->prodotti, new ProdottoGenerale($_nome, $_prezzo, $_img));
        $this->totale += $_prezzo;
    }
}

$carrello = new Carrello;
$carrello->aggiungiProdotto('peluche', 15.00, 'immagine_peluche');
$carrello->aggiungiProdotto('cuccia', 12.40, 'immagine_cuccia');
$carrello->aggiungiProdotto('Zero Pulci', 15.30, 'immagine Antipulci');
$carrello->aggiungiProdotto('pappa', 12.60, 'immagine pappa');

var_dump($carrello);