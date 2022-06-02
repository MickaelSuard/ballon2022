<?php


include_once "database.php" ;
require_once './MesureCarteSD.php';


$lesMesuresCarteSD = new MesuresCarteSD(SERVEURBD, NOMDELABASE, LOGIN, MOTDEPASSE);

if (!empty($_FILES['csv_file']['tmp_name'])) {
    $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
    fgetcsv($file_data);
    while ($row = fgetcsv($file_data, 300, ";")) {
      
        $data[] = array(
            'horodatage' => $row[0],
            'altitude' => $row[1],
            'longitude' => $row[2],
            'latitude' => $row[3],
            'radiations' => $row[4],
            'pression' => $row[5],
            'temperature' => $row[6],
            'humidite' => $row[7]
        );
        $lesMesuresCarteSD->enregistrerCarteSD($row);
    }
     echo json_encode($data);
   
}