<?php
include_once __DIR__ . '/cartaCredito.php';
include_once __DIR__ . '/carrello.php';

class Utente
{
    private $utenteId;
    private $utenteNome;
    private $utenteCognome;
    private $utenteIndirizzo;
    private $utenteMetodoPagamento= []; 
    protected $carrello;

    public function __construct($_utenteId, $_utenteNome, $_utenteCognome, $_utenteIndirizzo){
        $this->utenteId = $_utenteId;
        $this->utenteNome = $_utenteNome;
        $this->utenteCognome = $_utenteCognome;
        $this->utenteIndirizzo = $_utenteIndirizzo;
        $this->carrello = new Carrello;
    }

    public function setUtenteId($_utenteId) {
        $this->utenteId = $_utenteId;
        return $this;
    }

    public function getUtenteId() {
        return $this->utenteId;
    }

    public function setUtenteNome($_utenteNome) {
        $this->utenteNome = $_utenteNome;
        return $this;
    }

    public function getUtenteNome() {
        return $this->utenteNome;
    }

    public function setUtenteCognome($_utenteCognome) {
        $this->utenteCognome = $_utenteCognome;
        return $this;
    }

    public function getUtenteCognome() {
        return $this->utenteCognome;
    }

    public function setUtenteIndirizzo($_utenteIndirizzo) {
        $this->utenteIndirizzo = $_utenteIndirizzo;
        return $this;
    }

    public function getUtenteIndirizzo() {
        return $this->utenteIndirizzo;
    }

    function aggiungiCarta($_numero, $_banca, $_scadenza, $_proprietario, $_cvc){
        array_push($this->utenteMetodoPagamento, new Carta_Credito($_numero, $_banca, $_scadenza, $_proprietario, $_cvc));
    }

    public function aggiungiAlCarrello($_nome, $_prezzo, $_img){
        $obj = $this->carrello;
        $obj->aggiungiProdotto($_nome, $_prezzo, $_img);
    }

}

$utente1 = new Utente(1, 'Mario', 'Rossi', 'Via Roma, 1');
$utente1->aggiungiCarta('1234567891234567', 'banca', '10 September 2024', 'signor signore', 456);
$utente1->aggiungiAlCarrello('oggetto aggiunto', 300, 'immagine');
$utente1->aggiungiAlCarrello('Altro oggetto aggiunto', 600,'altra immagine');
var_dump($utente1);

class Utente_registrato extends Utente
{
    private $mail;
    private $usarname;
    private $password;
    private $sconto = 20;

    public function __construct($_utenteId, $_utenteNome, $_utenteCognome, $_utenteIndirizzo, $_mail, $_usarname, $_password){
        parent::__construct($_utenteId, $_utenteNome, $_utenteCognome, $_utenteIndirizzo);
        $this->mail = $_mail;
        $this->usarname = $_usarname;
        $this->password = $_password;
    }
    
    public function setMail($_mail) {
        $this->mail = $_mail;
        return $this;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setUsarname($_usarname) {
        $this->usarname = $_usarname;
        return $this;
    }

    public function getUsarname() {
        return $this->usarname;
    }

    public function setPassword($_password) {
        $this->password = $_password;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }
    
    public function getSconto() {
        return $this->sconto;
    }

    public function aggiungiAlCarrello($_nome, $_prezzo, $_img){
        $obj = $this->carrello;
        $obj->aggiungiProdotto($_nome, $_prezzo, $_img);
        $obj->totale = $obj->totale - ($obj->totale * $this->sconto / 100);
    }

}

$utente2 = new Utente_registrato(2, "Mario", "Rossi", "Via Roma, 1", "la mail", "l'username", "la password");
$utente2->aggiungiCarta("1234567891234567","un altra banca","20 September 2024","Mario Rossi",456);
$utente2->aggiungiAlCarrello('oggetto aggiunto', 300, 'immagine');
$utente2->aggiungiAlCarrello('Altro oggetto aggiunto', 600,'altra immagine');
var_dump($utente2);