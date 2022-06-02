<?php

require_once './bibliothequeBallon.inc.php';
require_once './Mesure.php';
require_once './constante.inc.php';

$lesMesures = new MesuresCarte(SERVEURBD, NOMDELABASE, LOGIN, MOTDEPASSE);


$device = $_GET['device'];
$hex = $_GET['data'];
$time = $_GET['time'];
$date = date('Y-m-d H:i:s', $time);

if ($device == DEVICE && ctype_xdigit($hex)) {
    $trameChaineBinaireComplete = convertisseurHexaBin($hex);

    $altitudeDec = decoderTrameAlt($trameChaineBinaireComplete);
    $longitudeDec = decoderTrameLong($trameChaineBinaireComplete);
    $latitudeDec = decoderTrameLat($trameChaineBinaireComplete);
    $radiationDec = decoderTrameRad($trameChaineBinaireComplete);
    $temperatureDec = decoderTrameTemp($trameChaineBinaireComplete);
    $pressionDec = decoderTramePress($trameChaineBinaireComplete);
    $humiditeDec = decoderTrameHum($trameChaineBinaireComplete);

if ($altitudeDec<=2000){
     $ch = curl_init(); // initialisation 
    curl_setopt($ch, CURLOPT_URL, URL . "latitude=$latitudeDec&longitude=$longitudeDec&time=$time&altitude=$altitudeDec");  //definit l'option de transfert 
    curl_exec($ch); // execution
}
   
 $lesMesures->enregistrer($date,
            $altitudeDec,
            $longitudeDec,
            $latitudeDec,
            $radiationDec,
            $temperatureDec,
            $pressionDec,
            $humiditeDec);
}
