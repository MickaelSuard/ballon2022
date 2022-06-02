<?php

/**
 * @details  Classe s'occupant de l'envoi des données dans la base de données 
 */
class Mesures {

    private $bdd;
/**
 * @details fonction de connexion à la base de données 
 * @param type $serveurBD adresse de la base de données 
 * @param type $nomBDD nom de la base de données 
 * @param type $login identifiant de la base de données 
 * @param type $motdepasse motdepasse de la base de données 
 */
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
    
    /**
     * @details fonction permettant la mise à jour des données dans la base de données Ballon2022
     * @param type $date date en décimal 
     * @param type $altitudeDec altitude en décimal 
     * @param type $longitudeDec longitude en décimal 
     * @param type $latitudeDec latitude en décimal 
     * @param type $radiationDec radiation en décimal 
     * @param type $temperatureDec température en décimal 
     * @param type $pressionDec pression en décimal 
     * @param type $humiditeDec humidite en décimal 
     */
    public function enregistrer(
            $date, 
            $altitudeDec, 
            $longitudeDec, 
            $latitudeDec, 
            $radiationDec, 
            $temperatureDec, 
            $pressionDec, 
            $humiditeDec) {
        
        try {
            $requete = $this->bdd->prepare("INSERT INTO TempsReel (horodatage,altitude,longitude,latitude,radiations,temperature,pression,humidite) VALUES (:horodatage,:altitude,:longitude,:latitude,:radiations,:temperature,:pression,:humidite);");
            $requete->bindParam(":horodatage", $date);
            $requete->bindParam(":altitude", $altitudeDec);
            $requete->bindParam(":longitude", $longitudeDec);
            $requete->bindParam(":latitude", $latitudeDec);
            $requete->bindParam(":radiations", $radiationDec);
            $requete->bindParam(":temperature", $temperatureDec);
            $requete->bindParam(":pression", $pressionDec);
            $requete->bindParam(":humidite", $humiditeDec);
            $requete->execute();
            echo "transfert de données effectué";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
}

