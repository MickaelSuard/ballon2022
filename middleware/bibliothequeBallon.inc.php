<?php

/**
 * 
 * @details conversion trame héxadécimale en binaire. mets dans un tableau la trame découpé par 2 octets puis convertit en binaire et ajoute un 0 si le bit est inférieur à 8
 * @param type $hex trame brut
 * @return string
 */

function convertisseurHexaBin($hex) {
    $longueur = 8;
    $arr = str_split($hex, 2); //découpage hex en 2 
    $trameChaineBinaireComplete = "";
    for ($i = 0; $i < count($arr); $i++) {
        $binaire = base_convert($arr[$i], 16, 2);

        $binaire = str_pad($binaire, $longueur, "0", STR_PAD_LEFT); // ajout de 0 si bit manquant          
        $trameChaineBinaireComplete = $trameChaineBinaireComplete . $binaire;
    }
    return $trameChaineBinaireComplete;
}

/**
 * 
 * @details conversion données binaire en données décimal pour l'altitude. Prends les 15 premiers bit de la trame total et convertit en décimal. 
 * @param type $total trame total binaire
 * @return type
 */


function decoderTrameAlt($total) {
    $altitude = substr($total, 0, 15);
    $altitudeDec = bindec($altitude);
    //echo "Altitude en binaire : ($altitude)</br>";
    //echo "Altitude : $altitudeDec m</br>";
    echo "<br>";
    return $altitudeDec;
}


/**
 * @details conversion données binaire en données décimal pour la latitude. Prends les 21 bits à partir du 15eme bits de la trame total et convertit en décimal.
 * @param type $total trame total binaire
 * @return type
 */
function decoderTrameLat($total) {
    $latitude = substr($total, 15, 21);
    $latitudeDec = bindec($latitude);
    $latitudeDec = ($latitudeDec / 100000) + 40;
    return $latitudeDec;
}


/**
 * @details conversion données binaire en données décimal pour la longitude. Prends les 21 bits à partir du 36eme bits de la trame total et convertit en décimal.
 * @param type $total trame total binaire
 * @return type
 */

function decoderTrameLong($total) {
    $signeLongitude = substr($total, 36, 1);
    $signeLongitudeDec = bindec($signeLongitude);
    if ($signeLongitude == '0') {
        $signeLongitudeDec = '+';
    } else {
        $signeLongitudeDec = '-';
    }
    echo "<br>";

    $longitude = substr($total, 37, 20);
    $longitudeDec = bindec($longitude);
    if ($signeLongitudeDec == '+') {
        $longitudeDec = ($longitudeDec / 100000);
    } else {
        $longitudeDec = ($longitudeDec / 100000);
        $longitudeDec = $longitudeDec * -1;
    }
    return $longitudeDec;
}

/**
 * @details conversion données binaire en données décimal pour la radiation. Prends les 15 bits à partir du 57eme bits de la trame total et convertit en décimal.
 * @param type $total total trame binaire
 * @return type
 */

function decoderTrameRad($total) {
    $radiation = substr($total, 57, 15);
    $radiationDec = bindec($radiation);
    return $radiationDec;
}

/**
 * @details conversion données binaire en données décimal pour la pression. Prends les 10 bits à partir du 72eme bits de la trame total et convertit en décimal.
 * @param type $total total trame binaire
 * @return type 
 */

function decoderTramePress($total) {
    $pression = substr($total, 72, 10);
    $pressionDec = bindec($pression);
    return $pressionDec;
}

/**
 * @details conversion données binaire en données décimal pour l'humidité. Prends les 7 bits à partir du 82eme de la trame total bits et convertit en décimal.
 * @param type $total total trame binaire
 * @return type
 */

function decoderTrameHum($total) {
    $humidite = substr($total, 82, 7);
    $humiditeDec = bindec($humidite);
    return $humiditeDec;
}

/**
 * @details conversion données binaire en données décimal pour la température. Prends les 7 bits à partir du 89eme de la trame total bits et convertit en décimal.
 * @param type $total total trame binaire 
 * @return type
 */

function decoderTrameTemp($total) {
    $signeTemperature = substr($total, 89, 1);
    $signeTemperatureDec = bindec($signeTemperature);
    if ($signeTemperature == '0') {
        $signeTemperatureDec = '+';
    } else {
        $signeTemperatureDec = '-';
    }
    echo "<br>";
    $temperature = substr($total, 90, 6);
    $temperatureDec = bindec($temperature);
    if ($signeTemperature == '0') {
    } else {
        $temperatureDec = $temperatureDec * -1;
    }
    echo "<br>";
    return $temperatureDec;
}

?>
