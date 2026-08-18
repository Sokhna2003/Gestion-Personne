<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/Personne.php";

class PersonneController
{
    private Personne $personne;

    public function __construct()
    {
        $database = new Database();
        $connection = $database->getConnection();

        $this->personne = new Personne($connection);
    }

    public function ajouter(
        string $nom,
        string $prenom,
        string $photo
    ): bool {
        return $this->personne->ajouter(
            $nom,
            $prenom,
            $photo
        );
    }

    public function lister(): array
    {
        return $this->personne->lister();
    }
}
