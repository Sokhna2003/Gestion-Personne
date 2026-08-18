<?php

class Personne
{
    private PDO $connection;
    private string $table = "personnes";

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function ajouter(
        string $nom,
        string $prenom,
        string $photo,
        string $photoType
    ): bool {

        $sql = "INSERT INTO {$this->table}
                (nom, prenom, photo, photo_type)
                VALUES
                (:nom, :prenom, :photo, :photo_type)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":photo", $photo, PDO::PARAM_LOB);
        $stmt->bindParam(":photo_type", $photoType);

        return $stmt->execute();
    }

    public function lister(): array
    {
        $sql = "SELECT id, nom, prenom, photo, photo_type
                FROM {$this->table}
                ORDER BY id DESC";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
