<?php

Class Carta_Credito {
   private $numero;
   private $banca;
   private $scadenza;
   private $proprietario;
   private $cvc;

    function __construct($_numero, $_banca, $_scadenza, $_proprietario, $_cvc) {
        $this->numero = $_numero;
        $this->banca = $_banca;
        $this->scadenza = $_scadenza;
        $this->proprietario = $_proprietario;
        $this->cvc = $_cvc;
    }

    public function setNumero($_numero) {
        $this->numero = $_numero;
        return $this;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setBanca($_banca) {
        $this->banca = $_banca;
        return $this;
    }

    public function getBanca() {
        return $this->banca;
    }
    //ci ritorno dopo aver settato il resto, non va!
    public function setScadenza($_scadenza) {
        $data= strtotime($_scadenza);
        $now = strtotime(date_create('now')->format('Y-m-d'));
        if($data > $now ){
             $this->scadenza = $_scadenza;
        } else {
            $this->scadenza = 'la carta è scaduta';
        }
        return $this;
    }

    public function getScadenza() {
        return $this->scadenza;
    }

    public function setProprietario($_proprietario) {
        $this->proprietario = $_proprietario;
        return $this;
    }

    public function getProprietario() {
        return $this->proprietario;
    }

    public function setCvc($_cvc) {
        $this->cvc = $_cvc;
        return $this;
    }

    public function getCvc() {
        return $this->cvc;
    }
}

$carta1= new Carta_Credito('1234567891234567', 'Nome Banca', '2022-05-01', 'Pippo Franco', '123');
// var_dump ($carta1);
