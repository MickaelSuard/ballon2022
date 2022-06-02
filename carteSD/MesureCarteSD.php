<?php

class MesuresCarteSD {

    private $bdd;

    public function __construct($serveurBD, $nomBDD, $login, $motdepasse) {

        try {
            $this->bdd = new PDO("mysql:host={$serveurBD};dbname={$nomBDD};charset=utf8mb4", $login, $motdepasse);
            // définition du mode d'erreur sur exception
            $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $ex) {
            echo "Erreur dans le constructeur de Mesures <br>";
            echo $ex->getMessage();
        }
    }

    public function enregistrerCarteSD($row) {

        try {
            $requete = $this->bdd->prepare("INSERT INTO CarteSD (horodatage,altitude,longitude,latitude,radiations,temperature,pression,humidite) VALUES (:horodatage,:altitude,:longitude,:latitude,:radiations,:temperature,:pression,:humidite);");
            $requete->bindParam(":horodatage", $row[0]);
            $requete->bindParam(":altitude", $row[1]);
            $requete->bindParam(":longitude", $row[2]);
            $requete->bindParam(":latitude", $row[3]);
            $requete->bindParam(":radiations", $row[4]);
            $requete->bindParam(":temperature", $row[5]);
            $requete->bindParam(":pression", $row[6]);
            $requete->bindParam(":humidite", $row[7]);
            $requete->execute();
        } catch (PDOException $ex) {
            //echo $ex->getMessage();
            $data[0]=array(
            'horodatage' => "déjà upload",
            'altitude' => "déjà upload",
            'longitude' => "déjà upload",
            'latitude' => "déjà upload",
            'radiations' => "déjà upload",
            'pression' => "déjà upload",
            'temperature' => "déjà upload",
            'humidite' => "déjà upload"
        );
            echo json_encode($data);
            die();
        }
    }

}
